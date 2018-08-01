<?php

namespace Modules\Admin\Http\Controllers;

//Controlador Padre
use Modules\Admin\Http\Controllers\Controller;

//Dependencias
use DB;
use App\Http\Requests\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

//Request
use Modules\Admin\Http\Requests\BloqueosRequest;

//Modelos
use Modules\Admin\Model\Bloqueos;

class BloqueosController extends Controller {
	protected $titulo = 'Bloqueos';

	public $librerias = [
		'alphanum',
		'maskedinput',
		'datatables',
		'jquery-ui',
		'jquery-ui-timepicker',
		'bootstrap-select',
	];

	public $js = ['Bloqueos'];

	public function index() {
		return $this->view('admin::Bloqueos');
	}

	public function buscar(Request $request, $id = 0){

		$Bloqueos = Bloqueos::find($id);
		
		if ($Bloqueos){
			return array_merge($Bloqueos->toArray(), [
				's' => 's', 
				'msj' => trans('controller.buscar')
			]);
		}
		return trans('controller.nobuscar');
	}

	public function guardar(BloqueosRequest $request, $id = 0){
		DB::beginTransaction();
		try{
			if ($id === 0){
				Bloqueos::create($request->all());
			}else{
				Bloqueos::find($id)->update($request->all());
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
			Bloqueos::destroy($id);
		}catch(Exception $e){
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.eliminar')];
	}

	public function restaurar(Request $request, $id = 0) {
		try {
			Bloqueos::withTrashed()->find($id)->restore();
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.restaurar')];
	}

	public function destruir(Request $request, $id = 0) {
		try {
			Bloqueos::withTrashed()->find($id)->forceDelete();
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.destruir')];
	}

	public function datatable(Request $request){
		$sql = Bloqueos::select([
			'id','parametro', 'activo', 'fecha_desde'
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

	public function bloquear($parametro, $fecha = null, $tipoNomina = null){

		$bloqueo = Bloqueos::where('parametro', $parametro)->get();
		$fecha = Carbon::parse($fecha)->format('d/m/Y');

		$nomina = explode(',', $bloqueo->first()->tipoNomina);

		if ($tipoNomina != null) {
			foreach ($nomina as $key => $value){
				if ($value == $tipoNomina){
					return true;
				}
			}
		}

		if ((strtotime($bloqueo->first()->fecha_desde) >= strtotime($fecha)) && (strtotime($bloqueo->first()->fecha_hasta) <= strtotime($fecha))) {
			return true;
		}else if($bloqueo->first()->activo == "1"){
			return true;
		}

		return false;
	}
}