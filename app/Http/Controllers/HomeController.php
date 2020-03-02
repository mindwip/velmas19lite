<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

//Models:
use App\Contract;
use App\ContractBlocks;
use App\UserContracts;

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
    public function editContract($slug = false){
        if(!$slug){
            return redirect('/');
        }

        $contract = Contract::where('slug', $slug)->first();

        return view('web.formulario-editar')->with(compact('contract'));   
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
