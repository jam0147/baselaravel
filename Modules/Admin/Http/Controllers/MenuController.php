<?php

namespace Modules\Admin\Http\Controllers;

//Controlador Padre
use Modules\Admin\Http\Controllers\Controller;

//Request
use App\Http\Requests\Request;
use Modules\Admin\Http\Requests\menuRequest;

//Modelos
use Modules\Admin\Model\app_estructura as estructura;
use Modules\Admin\Model\Menu;

class MenuController extends Controller {
	protected $titulo = 'Menu';

	public $librerias = [
		'alphanum', 
		'datatables',
		'jstree'
	];

	public function index() {
		return $this->view('admin::menu');
	}

	public function buscar(Request $request, $id) {
		$rs = Menu::find($id);

		if ($rs) {
			return array_merge($rs->toArray(), [
				's' => 's',
				'msj' => trans('controller.buscar'),
			]);
		}

		return trans('controller.nobuscar');
	}

	public function crear(menuRequest $request) {
		try {
			$data = $request->input('data');
			$ids = [];

			foreach ($data as $valor) {
				$ids[$valor['id']] = 0;

				if (!is_numeric($valor['padre'])) {
					$valor['padre'] = $ids[$valor['padre']];
				}

				if (!is_numeric($valor['id'])) {
					$menu = Menu::create($valor);
				} else {
					$menu = Menu::firstOrNew([
						'id' => $valor['id'],
					]);

					$menu->fill($valor);
					$menu->save();
				}

				$ids[$valor['id']] = $menu->id;
			}

			$eliminados = $request->input('eliminados');
			Menu::destroy($eliminados);
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.incluir')];
	}

	public function eliminar(Request $request, $id = 0) {
		try {
			$rs = Menu::destroy($id);
		} catch (Exception $e) {
			return $e->errorInfo[2];
		}

		return ['s' => 's', 'msj' => trans('controller.eliminar')];
	}

	public function arbol() {
		return Menu::estructura();
	}
}