<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

//Models:
use App\Category;
use App\Contract;
use App\ContractBlocks;
use App\Variable;

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

        //Ampliación de información de los objetos:
        if($contracts){
            foreach($contracts as $row){
                //Enviamos las fechas ya formateadas:
                $row->alta = $row->created_at->format('d/m/Y');
            }
        }

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

        $categories = Category::all();

        return view('admin.contracts.create')->with(compact('op', 'subop', 'opActive', 'categories'));
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

        //dd($request->all());

        //Slug:
        $slug = Str::slug($request->name);

        $contract = new Contract();
        $contract->name = $request->name;
        $contract->slug = $slug;
        //$contract->author_id = Auth::user()->id;
        $contract->author_id = 1;
        $contract->category_id = $request->category_id;
        $contract->description = $request->description;
        $contract->price = $request->price;
        $contract->save();

        //dd($request->block_item);

        //Guardamos bloques:
        if($request->block_item){
            $i = 1;
            foreach($request->block_item as $b){
                $alias = $b['alias']? $b['alias']:'sin nombre';
                $cbslug = Str::slug($alias);

                $position = $b['position']? $b['position']:$i;

                $father = (isset($b['father']) && $b['father'])? $b['father']:'No';

                $cb = new ContractBlocks();
                $cb->name = $alias;
                $cb->slug = $cbslug;
                $cb->contract_id = $contract->id;
                $cb->position = $position;
                $cb->father = $father;
                $cb->save();

                $i++;
            }
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
        $op = 'Editar contrato';
        $subop = $contract->name;
        $opActive = 'formularios';

        $blocks = ContractBlocks::where('contract_id', $contract->id)->get();

        $categories = Category::all();

        return view('admin.contracts.edit')->with(compact('op', 'subop', 'opActive', 'contract', 'blocks', 'categories'));
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
        $contract->category_id = $request->category_id;
        $contract->description = $request->description;
        $contract->price = $request->price;
        $contract->save();

        //Guardamos bloques:
        if($request->block_item){
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
        }

        $msg = 'Contrato actualizado correctamente';
        return redirect()->route('contracts.edit', $contract->id)->with(compact('msg'));
    }

    /**
     * Actualizar bloque:
     */
    public function updateBlock(Request $request){
        $b = ContractBlocks::find($request->input('id'));
        $b->block = $request->input('block');
        $b->save();

        $msg = 'El contenido se ha guardado correctamente';
        return redirect()->route('contracts.edit-block',  $request->input('id'))->with(compact('msg'));
    }

    /**
     * Eliminar contrato.
     */
    public function destroy(Contract $contract){
        $contract->delete();

        $msg = 'El contrato se ha eliminado correctamente';
        return redirect()->route('contracts.index')->with(compact('msg'));    
    }  

    /**
     * Eliminar bloque de contrato.
     */
    public function deleteBlock(ContractBlocks $block){
        $block->delete;

        $msg = 'El bloque ha sido eliminado correctamente';
        return redirect()->route('contracts.edit', $block->contract_id)->with(compact('msg'));
    }

    /**
     * Editar block.
     */
    public function editBlock(ContractBlocks $block){
        $op = 'Editar bloque';
        $subop = $block->name;
        $opActive = 'formularios';

        $variables = Variable::where('contract_id', $block->contract_id)->get();

        return view('admin.contracts.edit-block')->with(compact('op', 'subop', 'opActive', 'block', 'variables'));
    }

    /**
     * Guardar variable de bloque.
     */
    public function storeVariable(Request $request){
        if($request->ajax()){ 

            //dd($request->all());

            $v = new Variable();
            $v->name = Str::slug($request->name);

            if($request->type == 'p' && $request->answer){
                $values = serialize($request->answer);
                $v->values = $values;
            }

            $v->type = $request->type;
            $v->contract_id = $request->contract_id;
            $v->save();

            //$msg = 'La variable se ha guardado correctamente';
            //return redirect()->route('contracts.edit-block',  $request->block_id)->with(compact('msg'));
            
            return response()->json($v);
        }
    }

    /**
     * Eliminar variable.
     */
    public function deleteVariable(Request $request, Variable $variable){
        if($request->ajax()){ 
            //$block_id = $variable->block_id;

            $variable->delete();

            //$msg = 'La variable ha sido eliminada correctamente';
            //return redirect()->route('contracts.edit-block',  $block_id)->with(compact('msg'));
            
            return response()->json(true);
        }
    }
}
