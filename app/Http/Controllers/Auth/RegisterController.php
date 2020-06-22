<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    // Redirección customizada:
    public function redirectTo(){
        $prev = str_replace(url('/'), '', url()->previous());

        if($prev == '/checkout'){
            return 'checkout';
        }else{
            return '/';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'state' => 1
        ]);

        //Email:
        $emailFrom = config('constants.EMAIL_');
        $emailTo = $user->email;
        $data['usuario'] = $user;

        Mail::send('emails.welcome', $data, function($message) use($emailFrom, $emailTo){
            $message->from($emailFrom, 'Velmas19 Lite');
            $message->to($emailTo);
            $message->subject('Bienvenido a Velmas19 Lite'); 
        }); 

        return $user;
    }
}
