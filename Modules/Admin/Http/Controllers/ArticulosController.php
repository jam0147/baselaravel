<?php

namespace Modules\Admin\Http\Controllers;

//Dependencias
use DB;
use URL;
use Yajra\Datatables\Datatables;

//Controlador Padre
use Modules\Admin\Http\Controllers\Controller;

//Request
use App\Http\Requests\Request;

//Modelos
use Modules\Admin\Model\Articulos;
use Modules\Admin\Model\Perfil;
use Modules\Admin\Model\Menu;
use Modules\Admin\Model\UsuarioPermisos;

class ArticulosController extends Controller {
	protected $titulo = 'Articulos';

	public $librerias = [
		'alphanum', 
		'maskedinput', 
		'datatables', 
		'jstree',
	];

	public function index() {
		return $this->view('admin::articulos');
	}

	public function buscar(Request $request, $id) {
		if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')){
			$articulo = Articulos::withTrashed()->find($id);
		}else{
			$articulo = Articulos::find($id);
		}

		if ($articulo){
			return array_merge($articulo->toArray(), [
				'permisos' => $permisos,
				's' => 's',
				'msj' => trans('controller.buscar'),
			]);
		}

		return trans('controller.nobuscar');
	}

	
	

	public function guardar(ArticulosRequest $request, $id = 0) {
		DB::beginTransaction();
		try {
			$data = $this->data($request);
			if ($id === 0){
				$articulos = Articulos::create($data);
				$id = $articulos->id;
			}else{
				Articulos::find($id)->update($data);
			}
		} catch (Exception $e) {
			DB::rollback();
			return $e->errorInfo[2];
		}

		DB::commit();
		return ['s' => 's', 'msj' => trans('controller.incluir')];
	}

	public function eliminar(Request $request, $id = 0) {
		try {
			$articulos = Articulos::destroy($id);
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.eliminar')];
	}

	public function restaurar(Request $request, $id = 0) {
		try {
			Articulos::withTrashed()->find($id)->restore();
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.restaurar')];
	}

	public function destruir(Request $request, $id = 0) {
		try {
			Articulos::withTrashed()->find($id)->forceDelete();
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.destruir')];
	}

	public function datatable(Request $request) {
		$sql = DB::table('SAPROD as a')
				   ->select('a.CodProd as id', 'a.descrip', 'b.Existen','a.CostAct', 'a.CostPro', 'a.Precio3' )
				   ->leftJoin('SAEXIS as b', 'b.CodProd', '=', 'a.CodProd')
				   ->get();
		/*if ($request->verSoloEliminados == 'true'){
			$sql->onlyTrashed();
		}elseif ($request->verEliminados == 'true'){
			$sql->withTrashed();
		}
		*/
		return Datatables::of($sql)
			->setRowId('id')
			->setRowClass(function ($registro) {
				return is_null($registro->descrip) ? '' : '.bg-silver bg-font-black-thunderbird';
			})
			->make(true);
	}
}