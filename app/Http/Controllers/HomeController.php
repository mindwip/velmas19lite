<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

//Models:
use App\Contract;
use App\ContractBlocks;
use App\UserContracts;
use App\Variable;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $contracts = Contract::where('state', 1)->get();

        return view('home')->with(compact('contracts'));
    }

    /**
     * Página estáticas.
     */
    public function condicionesUso(){
        return view('web.terms-use');    
    }
    public function politicasPrivacidad(){
        return view('web.privacy-policy');    
    }
    public function politicasCookies(){
        return view('web.cookies-policy');    
    }

    /**
     * Formulario detalle.
     */
    public function formulario($slug = false){
        if(!$slug){
            return redirect('/');
        }

        $contract = Contract::where('slug', $slug)->first();

        if(!$contract){
            return redirect('/');
        }

        $blocks = ContractBlocks::where('contract_id', $contract->id)->get();

        return view('web.formulario')->with(compact('contract', 'blocks'));
    }

    /**
     * Añadir al carrito:
     */
    public function addCarrito($slug = false){
        if(!$slug){
            return redirect('/');
        }

        $contract = Contract::where('slug', $slug)->first();

        //Declaramos sesión:
        if(!session('contracts')){
            \Session::push('contracts', $contract->id);     
        }    

        //dd($contract, session('contracts'));

        //Pasamos contrato a la sesión si no existe:
        if(!in_array($contract->id, session('contracts'))){
            \Session::push('contracts', $contract->id);    
        }

        return redirect()->route('carrito');
    }

    /**
     * Carrito.
     */
    public function carrito(){
        if(empty(session('contracts'))){
            return redirect('/');  
            exit;  
        }

        //Contratos del carrito:
        $contracts = Contract::whereIn('id', session('contracts'))->get();
        
        return view('web.carrito')->with(compact('contracts'));
    }

    /**
     * Editar contrato.
     */
    public function editContract(UserContracts $user_contract){
        if(!$user_contract){
            return redirect('/');
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
        }

        //Variables del formulario:
        $variables = Variable::select('variables.id', 'variables.name', 'variables.type')
        ->join('contract_blocks', 'variables.block_id', '=', 'contract_blocks.id')
        ->where('contract_blocks.contract_id', $user_contract->contract_id)
        ->get();

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
     * Eliminar contrato de carrito:
     */
    public function deleteContract($id = false){
        if(!$id){
            return redirect('/');
            exit;
        }   

        $oldArr = session('contracts');
        \Session::forget('contracts'); 
        foreach($oldArr as $r){
            if($r != $id){
                \Session::push('contracts', $r);
            }
        }

        return redirect()->route('carrito');
    }

    /**
     * Checkout:
     */
    public function checkout(){
        if(empty(session('contracts'))){
            return redirect('/');  
            exit;  
        }

        //Contratos del carrito:
        $contracts = Contract::whereIn('id', session('contracts'))->get();
        
        return view('web.checkout')->with(compact('contracts'));    
    }

    /**
     * Formulario de contacto.
     */
    public function contacta(){
        return view('web.contact');    
    }
    
}
