<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Modules\Comercios\Model\Ambito;
use Modules\Comercios\Model\Estado;
use Modules\Comercios\Model\Municipio;
use Modules\Comercios\Model\Pais;
use Modules\Web\Http\Controllers\WebController;


class EscritorioController extends Controller {
	public $autenticar = false;

	protected $titulo = 'Escritorio';

	public function __construct() {
		parent::__construct();

		$this->middleware('Authenticate');
	}

	public function index() {
		
		if(Auth::user()->perfil_id == 5){
			return redirect()->route('ventas.venta');
		}
		return $this->view('admin::escritorio');
	}

	public function pais(){
		return Pais::pluck('nombre', 'id');
	}
	public function estado(){
		return Estado::pluck('nombre', 'id');
	}
	public function municipio(){		
		return Municipio::pluck('nombre', 'id');
	}
	public function ambito(){
		return Ambito::pluck('nombre', 'id');		
	}
}