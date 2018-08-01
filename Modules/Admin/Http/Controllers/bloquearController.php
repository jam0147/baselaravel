<?php

namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Controllers\Controller;

class bloquearController extends Controller {
	public $autenticar = false;

	protected $titulo = 'Opciones de Bloqueo';

	public function __construct() {
		parent::__construct();

		$this->middleware('Authenticate');
	}

	public function index() {
		return $this->view('admin::Bloqueos');
	}
}