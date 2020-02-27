<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

//Models:
use App\Contract;
use App\ContractBlocks;

class ContractController extends Controller{
	private $option = 'formularios tipo';  

	//0. Validator:
    protected function validator(array $data){
        //Validación save:
        if(isset($data['submit_save'])){
            return Validator::make($data, [
                'name' => 'required|string|max:255|unique:contracts,name,NULL,id,deleted_at,NULL',
                'price' => 'numeric'
            ],[
                'name.unique' => 'El nombre de formulario ya existe'
            ]);

        //Validación update:
        }elseif(isset($data['submit_update'])){
            return Validator::make($data, [
                'name' => "required|string|max:255|unique:contracts,name,".$data['id'].",id,deleted_at,NULL",
                'price' => 'numeric'
            ],[
                'name.unique' => 'El nombre de formulario ya existe'
            ]);   

        //Validación update password:
        }elseif(isset($data['update_pwd'])){ 
            return Validator::make($data, [  
                'password' => 'required|string|confirmed|min:6|max:12'  
            ],[
                'password.min' => trans('textos.password_aviso_num_caracteres'),
                'password.max' => trans('textos.password_aviso_num_caracteres')
            ]);
        }
    }

	/**
     * Listado de formularios.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){
		$op = $this->option;
        $subop = 'Formularios Creados';
        $opActive = 'formularios';
		
		return view('admin.contracts.index', compact('op', 'subop', 'opActive'));   
	}  

     /**
     * Get listing of the resources by ajax:
     */
    public function contractsApiData(){
        $contracts = Contract::select('contracts.*', 'users.name AS Nombre', 'users.surname')
        ->join('users', 'contracts.author_id', '=', 'users.id')
        ->get();

        return datatables($contracts)->toJson();
    }

	/**
     * Formulario nuevo contrato.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $op = 'Crear Formulario';
        $subop = 'Gestión de formularios';
        $opActive = 'formularios_crear';

        return view('admin.contracts.create')->with(compact('op', 'subop', 'opActive'));
    }

     /**
     * Guardar nuevo contrato.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('/admin/contracts/create')
                ->withErrors($validator)
                ->withInput();
        }

        //Slug:
        $slug = Str::slug($request->name);

        $contract = new Contract();
        $contract->name = $request->name;
        $contract->slug = $slug;
        //$contract->author_id = Auth::user()->id;
        $contract->author_id = 1;
        $contract->description = $request->description;
        $contract->price = $request->price;
        $contract->save();

        //Guardamos bloques:
        foreach($request->block_item as $b){
            $cbslug = Str::slug($b['alias']);

            $cb = new ContractBlocks();
            $cb->name = $b['alias'];
            $cb->slug = $cbslug;
            $cb->contract_id = $contract->id;
            $cb->position = $b['position'];
            $cb->father = $b['father'];
            $cb->save();
        }

        $msg = 'Contrato creado correctamente';
        return redirect()->route('contracts.edit', $contract->id)->with(compact('msg'));
    }

    /**
     * Editar contrato.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract){
        $op = $this->option;
        $subop = 'Editar Contrato';
        $opActive = 'formularios';

        $blocks = ContractBlocks::where('contract_id', $contract->id)->get();

        return view('admin.contracts.edit')->with(compact('op', 'subop', 'opActive', 'contract', 'blocks'));
    }

    /**
     * Actualizar contrato.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('admin/contracts/'.$request->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        //Slug:
        $slug = Str::slug($request->name);

        $contract = Contract::find($request->input('id'));
        $contract->name = $request->name;
        $contract->slug = $slug;
        $contract->price = $request->price;
        $contract->save();

        $msg = 'Contrato actualizado correctamente';
        return redirect()->route('contracts.edit', $contract->id)->with(compact('msg'));
    }

    /**
     * Eliminar contrato.
     */
    public function destroy(Contract $contract){
        $contract->delete();

        $msg = 'El contrato se ha eliminado correctamente';
        return redirect()->route('contracts.index')->with(compact('msg'));    
    }  
}
