<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDF;

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

        //Número de venta:
        if(!session('sale')){
            $sale = Auth::user()->id.time();
            \Session::push('sale', $sale);     
        }  

        //Borramos los registros de la sesión:
        UserContracts::where('sale', session('sale')[0])->delete();

        foreach (session('contracts') as $row){
            $contract = Contract::select('price')->find($row);

            $uc = new UserContracts();
            $uc->user_id = Auth::user()->id;
            $uc->contract_id = $row;
            $uc->sale = session('sale')[0];
            $uc->price = $contract->price;
            $uc->state = 0;
            $uc->save(); 
        }

        //Contratos del carrito:
        $contracts = Contract::whereIn('id', session('contracts'))->get();
        
        return view('web.checkout')->with(compact('contracts'));    
    }

    /**
     * Página respuesta tras compra.
     */
    public function responsePayu(Request $request){
        //Guardando operación:
        if($request['message'] == 'APPROVED'){
            UserContracts::where('sale', $request['referenceCode'])
            ->update(['state' => 1, 'payment_date' => NOW(), 'payment_method' => $request['lapPaymentMethod']]);

            $status = 'ok';

        }else{
            $status = 'ko';
        }

        return redirect()->route('confirmation-pago', $status);
    }

    /**
     * Página de confirmación de compra.
     */
    public function confirmationPago($status){
        if($status == 'ok'){
            $msg = '<h2 class="text-success">La operación se ha completado con éxito</h2>';
        
        }else{
            $msg = '<h2 class="text-danger">Se ha producido algún problema durante el proceso de pago</h2>';
        }

        return view('web.confirmation')->with(compact('msg'));    
    }

    public function confirmationPayu(){

    }

    /**
     * Formulario de contacto.
     */
    public function contacta(){
        return view('web.contact');    
    }
    
}
