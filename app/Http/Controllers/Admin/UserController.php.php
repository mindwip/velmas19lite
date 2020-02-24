<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

//Models:
use App\User;
use App\UserContracts;

class UserController extends Controller{
	private $option = 'usuarios';

	public function __construct(){
        //$this->middleware('user_edit', ['only' => ['edit', 'update', 'updatePwd', 'storeImage']]);
    }	

    //0. Validator:
    protected function validator(array $data){
        //Validación save:
        if(isset($data['submit_save'])){
            return Validator::make($data, [
                'name' => 'required|string|max:191',
                'surname' => 'nullable|string|max:191',
                'email' => 'nullable|string|email|max:191|unique:users,email,NULL,id,deleted_at,NULL',
                'password' => 'required|string|confirmed|min:6|max:12'
            ],[
                'email.unique' => trans('textos.email_existe')
            ]);

        //Validación update:
        }elseif(isset($data['submit_update'])){
            return Validator::make($data, [
                'name' => 'required|string|max:75',
                'surname' => 'nullable|string|max:100',
                'email' => "nullable|string|email|max:191|unique:users,email,".$data['id'].",id,deleted_at,NULL"
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
     * Listado de usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	$op = $this->option;
        $subop = 'Gestión de usuarios';
        $opActive = 'usuarios';

        $profile = 'admin';

    	$users = User::where('isAdmin', 1)->get();

        return view('admin.users.index')->with(compact('op', 'subop', 'opActive', 'profile', 'users'));
    }

    /**
     * Listado de clientes.
     *
     * @return \Illuminate\Http\Response
     */
    public function customers(){
    	$op = 'clientes';
        $subop = 'Gestión de clientes';
        $opActive = 'clientes';

        $profile = 'customer';

    	//$users = User::where('isAdmin', 0)->get();

        return view('admin.users.customers')->with(compact('op', 'subop', 'opActive', 'profile'));
    }

    /**
     * Get listing of the resources by ajax:
     */
    public function usersApiData($isAdmin){
        $users = User::where('isAdmin', $isAdmin)->get();    

        return datatables($users)->toJson();
    }

    /**
     * Formulario nuevo usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $op = $this->option;
        $subop = 'Crear nuevo Usuario';
        $opActive = 'usuarios';

        $profile = 'admin';

        return view('admin.users.create')->with(compact('op', 'subop', 'profile', 'opActive'));
    }

    /**
     * Formulario nuevo cliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCustomer(){
        $op = 'clientes';
        $subop = 'Crear nuevo Cliente';
        $opActive = 'clientes';

        $profile = 'customer';

        return view('admin.users.create')->with(compact('op', 'subop', 'profile', 'opActive'));
    }

    /**
     * Guardar nuevo usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('/admin/users/create')
                ->withErrors($validator)
                ->withInput();
        }

        $isAdmin = $request->input('profile') == 'admin'? 1:0;   
        $state = $request->input('state')? 1:0;     
        
        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->isAdmin = $isAdmin;
        $user->role = $request->input('role');
        $user->state = $state;
        $user->remember_token = $request->input('_token');
        $user->save();

        $msg = trans('textos.usuario_creado_ok');
        return redirect()->route('users.edit', $user->id)->with(compact('msg'));
    }

    /**
     * Editar usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user){
        $op = $this->option;

        if($user->isAdmin == 1){
            $subop = 'Editar Usuario';
            $opActive = 'usuarios';
            $profile = 'admin';
            $user_contracts = false;

        }else{
            $subop = 'Editar Cliente';
            $opActive = 'clientes';
            $profile = 'customer';
            $user_contracts = UserContracts::select('user_contracts.state AS EstadoContrato', 'contracts.*')
            ->join('contracts', 'user_contracts.contract_id', '=', 'contracts.id')
            ->where('user_contracts.user_id', $user->id)
            ->get();
        }

        return view('admin.users.edit')->with(compact('op', 'subop', 'profile', 'opActive', 'user', 'user_contracts'));
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
            return redirect('admin/users/'.$request->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $state = $request->input('state')? 1:0;

        $user = User::find($request->input('id'));
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->state = $state;
        $user->save();  

        $msg = trans('textos.usuario_updated');
        return redirect()->route('users.edit', $user->id)->with(compact('msg'));
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
            return redirect('admin/users/'.$request->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($request->input('id'));
        $user->password = bcrypt($request->input('password'));
        $user->save();  

        $msg = trans('textos.usuario_updated');
        return redirect()->route('users.edit', $user->id)->with(compact('msg'));
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
