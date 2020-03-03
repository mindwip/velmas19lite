<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

//Models:
use App\Contract;
use App\ContractBlocks;
use App\User;
use App\UserContracts;

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
        $contracts = UserContracts::select('contracts.*')
            ->join('contracts', 'user_contracts.contract_id', '=', 'contracts.id')
            ->where('user_contracts.user_id', Auth::user()->id)
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

}
