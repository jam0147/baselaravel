<?php

namespace Modules\Admin\Http\Controllers;

//Controlador Padre
use Modules\Admin\Http\Controllers\Controller;

//Dependencias
use DB;
use App\Http\Requests\Request;
use Yajra\Datatables\Datatables;

//Request
use Modules\Admin\Http\Requests\AppPaisRequest;

//Modelos
use Modules\Admin\Model\AppPais;

class AppPaisController extends Controller {
	protected $titulo = 'App Pais';

	public $librerias = [
		'alphanum',
		'maskedinput',
		'datatables',
	];

	public function index() {
		return $this->view('admin::AppPais');
	}

	public function buscar(Request $request, $id = 0){
		if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')){
			$AppPais = AppPais::withTrashed()->find($id);
		}else{
			$AppPais = AppPais::find($id);
		}
		
		if ($AppPais){
			return array_merge($AppPais->toArray(), [
				's' => 's', 
				'msj' => trans('controller.buscar')
			]);
		}
		
		return trans('controller.nobuscar');
	}

	public function guardar(AppPaisRequest $request, $id = 0){
		DB::beginTransaction();
		try{
			if ($id === 0){
				AppPais::create($request->all());
			}else{
				AppPais::find($id)->update($request->all());
			}
		}catch(Exception $e){
			DB::rollback();
			return $e->errorInfo[2];
		}
		DB::commit();

		return ['s' => 's', 'msj' => trans('controller.incluir')];
	}

	public function eliminar(Request $request, $id = 0){
		try{
			AppPais::destroy($id);
		}catch(Exception $e){
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.eliminar')];
	}

	public function restaurar(Request $request, $id = 0) {
		try {
			AppPais::withTrashed()->find($id)->restore();
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.restaurar')];
	}

	public function destruir(Request $request, $id = 0) {
		try {
			AppPais::withTrashed()->find($id)->forceDelete();
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.destruir')];
	}

	public function datatable(Request $request){
		$sql = AppPais::select([
			'id', 'nombre', 'lenguaje'
		]);

		if ($request->verSoloEliminados == 'true'){
			$sql->onlyTrashed();
		}elseif ($request->verEliminados == 'true'){
			$sql->withTrashed();
		}
		
		return Datatables::of($sql)
			->setRowId('id')
			->setRowClass(function ($registro) {
				return is_null($registro->deleted_at) ? '' : 'bg-red-thunderbird bg-font-red-thunderbird';
			})
			->make(true);
	}
}