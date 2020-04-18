<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PDF;

//Models:
use App\Contract;
use App\ContractBlocks;
use App\User;
use App\UserContracts;
use App\Variable;

class CustomerController extends Controller{
	private $option = 'usuarios';

	public function __construct(){
        $this->middleware('auth');
        //$this->middleware('user_edit', ['only' => ['edit', 'update', 'updatePwd', 'storeImage']]);
    }	

    //0. Validator:
    protected function validator(array $data){
        //Validación update:
        if(isset($data['submit_update'])){
            return Validator::make($data, [
                'name' => 'required|string|max:75',
                'surname' => 'nullable|string|max:100',
                'email' => "nullable|string|email|max:191|unique:users,email,".Auth::user()->id.",id,deleted_at,NULL"
            ],[
                'email.unique' => trans('textos.email_existe')    
            ]);   

        //Validación update password:
        }elseif(isset($data['submit_password'])){ 
            return Validator::make($data, [  
                'password' => 'required|string|confirmed|min:6|max:12'  
            ],[
                'password.min' => trans('textos.password_aviso_num_caracteres'),
                'password.max' => trans('textos.password_aviso_num_caracteres')
            ]);
        }
    }

    /**
     * Ficha de cliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $contracts = UserContracts::select('user_contracts.id', 'contracts.name', 'contracts.slug')
            ->join('contracts', 'user_contracts.contract_id', '=', 'contracts.id')
            ->where('user_contracts.user_id', Auth::user()->id)
            ->where('user_contracts.state', 1)
            ->get();

        return view('web.cliente')->with(compact('contracts'));	
    }

    /**
     * Actualizar usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('cliente')
                ->withErrors($validator)
                ->withInput();
        }


        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->city = $request->input('city');
        $user->save();  

        $msg = trans('textos.usuario_updated');
        return redirect()->route('cliente')->with(compact('msg'));
    }

    /**
     * Actualizar contraseña.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request){
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('cliente')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->input('password'));
        $user->save();  

        $msg = trans('textos.usuario_updated');
        return redirect()->route('cliente')->with(compact('msg'));
    }

    /**
     * Eliminar usuario.
     */
    public function destroy(User $user){
        $isAdmin = $user->isAdmin;
        $user->delete();

        $msg = trans('textos.usuario_deleted');
        if($isAdmin == 1){
            return redirect()->route('users.index')->with(compact('msg'));
        }else{
            return redirect()->route('users.customers')->with(compact('msg'));    
        }
    }  

    /**
     * Editar contrato.
     */
    public function editContract(UserContracts $user_contract){
        if(!$user_contract){
            return redirect('/');
        }

        //Comprobamos que el contrato pertenezca al usuario.
        if(Auth::user()->id != $user_contract->user_id){
            return redirect('logout');
            exit;
        }

        $contract = Contract::find($user_contract->id);

        //Si el contenido original del contrato no está volcado en la tabla user_contracts, lo pasamos:
        if(!$user_contract->content){
            $contents = ContractBlocks::select('block')
            ->where('contract_id', $user_contract->contract_id)
            ->orderBy('position', 'ASC')
            ->get();

            $content = '';
            foreach($contents as $row){
                $content .= $row->block;
            }

            $user_contract->content = $content;
            $user_contract->save();
        }

        //Variables del formulario:
        $variables = Variable::select('variables.id', 'variables.name', 'variables.type')
        ->join('contract_blocks', 'variables.contract_id', '=', 'contract_blocks.contract_id')
        ->where('contract_blocks.contract_id', $user_contract->contract_id)
        ->groupBy('variables.id')
        ->get();

        //dd($user_contract, $contract, $variables);

        return view('web.formulario-editar')->with(compact('user_contract', 'contract', 'variables'));   
    }

    /**
     * Actualizar contrato de cliente.
     */
    public function updateContract(Request $request){
        $campos_recibidos = (count($request->all()) - 2) / 2;
        $serie = [];

        for($i=1; $i<=$campos_recibidos; $i++){
            $var = 'variable_'.$i; 
            $$var = $request->input($var);

            $valor = 'valor_'.$$var;
            $$valor = $request->input($valor);

            $serie[$$var] = $$valor;
        }

        $variables = serialize($serie);

        $uc = UserContracts::find($request->id);
        $uc->variables = $variables;
        $uc->save();

        return redirect()->route('formulario-editar', $request->id);    
    }

    /**
     * Descarga de formulario.
     */
    public function downloadContract(UserContracts $user_contract){
        //Comprobamos que el contrato pertenezca al usuario.
        /*if(Auth::user()->id != $user_contract->user_id){
            return redirect('logout');
            exit;
        }*/

        $contract = Contract::find($user_contract->id);

        //Variables del formulario:
        $variables = Variable::select('variables.id', 'variables.name', 'variables.type')
        ->join('contract_blocks', 'variables.block_id', '=', 'contract_blocks.id')
        ->where('contract_blocks.contract_id', $user_contract->contract_id)
        ->get();

        $values = unserialize($user_contract->variables);

        $content = '';
        preg_match_all('/\[+[a-zA-Z0-9]+\]/', $user_contract->content, $matches);
        $arr = [];

        foreach($matches[0] as $match){
            $match1 = $match;
            $match1 = substr($match1,1);
            $match1 = substr($match1,0,-1);

            foreach($variables as $var){
                if($var->name == $match1){
                    array_push($arr, $values[$var->id]);
                }
            }
        }

        $content = str_replace($matches[0], $arr, $user_contract->content);

        $pdf = PDF::loadView('downloads/contract', compact('user_contract', 'contract', 'content'));
        $pdf->setPaper('L', 'portrait');

        return $pdf->download('contrato.pdf');
    }

}
