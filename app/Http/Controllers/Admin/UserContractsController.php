<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models:
use App\UserContracts;

class UserContractsController extends Controller{
	private $option = 'Contratos de usuario';

	/**
     * Listado de formularios.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){
		$op = 'Contratos a revisar';
        $subop = 'Revisión a petición del cliente';
        $opActive = 'revision';
		
		return view('admin.user_contracts.index', compact('op', 'subop', 'opActive'));   
	}  

	/**
	 * Listado de contratos a revisar por ajax.
	 */
	public function revisionesApiData(){
		$revisiones = UserContracts::select('user_contracts.id', 'user_contracts.payment_date', 'user_contracts.price', 'user_contracts.created_at', 'user_contracts.state', 'contracts.name', 'users.name AS Nombre', 'users.surname')
		->join('users', 'user_contracts.user_id', '=', 'users.id')
		->join('contracts', 'user_contracts.contract_id', '=', 'contracts.id')
		->get();

		//Ampliación de información de los objetos:
        if($revisiones){
            foreach($revisiones as $row){
                //Enviamos las fechas ya formateadas:
                $row->alta = $row->created_at->format('d/m/Y');
            }
        }

		return datatables($revisiones)->toJson();
	}

	/**
     * Listado de pagos.
     *
     * @return \Illuminate\Http\Response
     */
	public function payments(){
		$op = 'Pagos';
        $subop = 'Estado de Contratos';
        $opActive = 'pagos';
		
		return view('admin.user_contracts.payments', compact('op', 'subop', 'opActive'));   
	}  

	/**
	 * Listado de pagos por ajax.
	 */
	public function paymentsApiData(){
		$payments = UserContracts::select('user_contracts.id', 'user_contracts.payment_date', 'user_contracts.price', 'user_contracts.payment_method', 'user_contracts.state', 'contracts.name', 'users.name AS Nombre', 'users.surname')
		->join('users', 'user_contracts.user_id', '=', 'users.id')
		->join('contracts', 'user_contracts.contract_id', '=', 'contracts.id')
		->get();

		return datatables($payments)->toJson();
	}

	/**
	 * Editar contrato de usuario.
	 */
	public function edit($id = false){
		if($id){
			$op = $this->option;
			$subop = 'Editar contrato';
        	$opActive = 'usuarios';

			$user_contract = UserContracts::select('contracts.*')
			->join('contracts', 'user_contracts.contract_id', '=', 'contracts.id')
            ->where('user_contracts.id', $id)
            ->first();

        	return view('admin.user_contracts.edit')->with(compact('op','subop', 'opActive', 'user_contract'));

		}else{
			return redirect('/');
		}
	}

	/**
	 * Actualizar contrato de usuario.
	 */
	public function update(Request $request){

		

		$msg = 'El contrato se ha actualizado correctamente';
        return redirect()->route('user_contracts.edit', $user_contract->id)->with(compact('msg'));	
	}

	/**
     * Eliminar contrato.
     */
    public function destroy(UserContracts $user_contracts){
        $user_contracts->delete();

        $msg = 'El contrato se ha eliminado correctamente';
        return redirect()->route('payments.index')->with(compact('msg'));    
    }  
}
