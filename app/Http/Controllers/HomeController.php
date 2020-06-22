<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use PDF;

//Models:
use App\Category;
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
     * Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $categories = Category::all();
        $contracts = Contract::where('state', 1)->get();

        return view('home')->with(compact('categories', 'contracts'));
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
     * Recibiendo respuesta tras compra.
     */
    public function responsePayu(Request $request){
        //Redirigiendo al usuario:
        if($request['transactionState'] == 4){
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
        //Guardando operación:
        if($request['transactionState'] == 4){
            UserContracts::where('sale', $request['referenceCode'])
            ->update(['state' => 1, 'payment_date' => NOW(), 'payment_method' => $request['lapPaymentMethod']]);

            $emailFrom = config('constants.EMAIL_');
            $emailTo = Auth::user()->email;
            $data['usuario'] = Auth::user();
            //Contratos del carrito:
            $data['contracts'] = Contract::whereIn('id', session('contracts'))->get();

            Mail::send('emails.confirm-purchase', $data, function($message) use($emailFrom, $emailTo){
                $message->from($emailFrom, 'Velmas19 Lite');
                $message->to($emailTo);
                $message->subject('Confirmación de compra'); 
            }); 

        }else{
            $status = 'ko';   
            return redirect()->route('confirmation-pago', $status); 
        }
    }

    /**
     * Formulario de contacto.
     */
    public function contacta(){
        return view('web.contact');    
    }

    /**
     * Enviar formulario de contacto:
     */
    public function contacto(Request $request){
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('contacta')
                ->withErrors($validator)
                ->withInput();
        }

        $emailFrom = $request->email;
        $emailTo = config('constants.EMAIL_');
        $data['usuario'] = $request;

        Mail::send('emails.send-contact', $data, function($message) use($emailFrom, $emailTo, $request){
            $message->from($emailFrom, $request->name);
            $message->to($emailTo);
            $message->subject('Contacto de '.$request->name.'. '.$request->subject); 
        }); 

        $msg = 'El email ha sido enviado correctamente. Te responderemos a la mayor brevedad';
        return redirect()->route('contacta')->with(compact('msg'));
    }

    /**
     * Categorias
     */
    public function categorias($slug = false){
        if(!$slug){
            return redirect('/');
        }

        $category = Category::where('slug', $slug)->first();

        $contracts = Contract::where('category_id', $category->id)->get();

        if(!$contracts){
            return redirect('/');
        }

        return view('web.categorias')->with(compact('contracts', 'category'));
    }
}
