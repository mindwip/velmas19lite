<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

//Models:
use App\Category;

class CategoryController extends Controller{
	private $option = 'categorias';

	public function __construct(){
    }

	//0. Validator:
    protected function validator(array $data){
        //Validación save:
        return Validator::make($data, [
            'name' => 'required|string|max:255'
        ]);
    }
	
	/**
     * 1. Relación de categorías.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	$op = $this->option;
        $subop = 'Categorías';
        $opActive = 'categorias';
        
        return view('admin.categories.index', compact('op', 'subop', 'opActive')); 
    }

    /**
     * 1.1. Listado de categorías para DataTable.
     */
    public function categoriesApiData(){
        $categories = Category::all(); 

        return datatables($categories)->toJson(); 
    }

    /**
     * Formulario nueva categoría.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $op = 'Crear categoría';
        $subop = 'Gestión de categorías';
        $opActive = 'categorias_crear';

        return view('admin.categories.create')->with(compact('op', 'subop', 'opActive'));
    }

    /**
     * 2. Guardar nueva categoría.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validator = $this->validator($request->all());
        if($validator->fails()){
        	//Indicamos el origen de la acción realizada para manejar el modal:
            $validator->getMessageBag()->add('accion', 'save');

            return redirect('/admin/categories')
                ->withErrors($validator)
                ->withInput();
        }

        //Slug:
        $slug = Str::slug($request->name);

        $category = new Category();
        $category->name = mb_strtolower($request->input('name'));
        $category->slug = $slug;
        $category->description = $request->description;
        $category->save();

        $msg = 'Categoría creada correctamente';
        return redirect()->route('categories.index')->with(compact('msg'));
    }

    /**
     * Editar categoría.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category){
        $op = 'Editar contrato';
        $subop = $category->name;
        $opActive = 'categorias';

        return view('admin.categories.edit')->with(compact('op', 'subop', 'opActive', 'category'));
    }

    /**
     * 3. Actualizar categoría.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $validator = $this->validator($request->all());
        if($validator->fails()){
            return redirect('admin/categories/'.$request->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        //Slug:
        $slug = Str::slug($request->name);

        $category = Category::find($request->input('id'));
        $category->name = mb_strtolower($request->input('name'));
        $category->slug = $slug;
        $category->description = $request->description;
        $category->save();  
        
        $msg = trans('textos.categoria_updated');

        return redirect()->route('categories.index')->with(compact('msg'));    
    }

    /**
     * 5. Eliminar categoría.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category){
        $category->delete();

        $msg = trans('textos.categoria_deleted');
        return redirect()->route('categories.index')->with(compact('msg'));    
    }
    
}
