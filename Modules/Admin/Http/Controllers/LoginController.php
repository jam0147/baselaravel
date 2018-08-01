<?php

namespace Modules\Admin\Http\Controllers;

//Dependencias
use Illuminate\Support\Facades\Auth;
use Session;

//Request
use Modules\Admin\Http\Requests\LoginRequest;

//Controlador Padre
use Modules\Admin\Http\Controllers\Controller;

//Modelos
use Modules\Admin\Model\Historico;
use Modules\Admin\Model\Usuario;
use Modules\Ventas\Http\Controllers\BlockchainTransactionsController;

class LoginController extends Controller {
	public $autenticar = false;

	protected $redirectTo = '/';   //antes era /escritorio
	protected $redirectPath = '/';   //antes era /escritorio
	protected $prefijo = '';
	
	public $js=[
		'jquery',
		'login'
	];
	public $librerias = ['pnotify'];

	public function __construct() {
		//$this->middleware('guest', ['except' => 'getSalir']);
		$this->prefijo = \Config::get('admin.prefix');

		$this->redirectTo = $this->prefijo . $this->redirectTo;
		$this->redirectPath = $this->prefijo . $this->redirectPath;

		if (Auth::check()) {
			return redirect($this->prefijo . '/');   //antes era /escritorio
		}
	}

	public function index() {
		if (Auth::check()) {
			return redirect($this->prefijo . '/');   //antes era /escritorio
		}

		return $this->view('ventas::login');
	}

	public function bloquear() {
		return $this->view('admin::Bloquear');
	}

	public function salir() {
		Auth::logout();
		return redirect('/');
	}
	public function validar(LoginRequest $request) {
		//validar capcha primero
		$params = array(); 
	
		parse_str($request->data, $params);
		$captcha = (array) $params;
		$variable =  $this->validarRecapcha($captcha);
		if(!$variable){
			return [
				's'=> 'n',
				
				'msj'=> 'Verificacion de captcha no valido'
			];
		}
		
		Session::put('paymenttype', 'bsf');

		$credenciales = $request->credenciales();
		$verificar = $this->verificarConfirmacion($credenciales);
		
		if($verificar['s'] == 'n'){
			return $verificar;
		}
		$credenciales['usuario'] = strtolower($credenciales['usuario']);
		$autenticado = Auth::attempt($credenciales, false);

		$login = $credenciales['usuario'];
		$idregistro = '';

		if (!$autenticado) {
			$data = [
				'correo' => $login,
				'password' => $credenciales['password']
			];

			$autenticado = Auth::attempt($data, true);
		}

		$idregistro = $autenticado ? '' : 'Clave:' . $credenciales['password'];
		$login = $credenciales['usuario'];

		Historico::create([
			'tabla' => 'autenticacion',
			'concepto' => 'ip' . $_SERVER['REMOTE_ADDR'],
			'idregistro' => $idregistro,
			'usuario' => $login,
		]);

		if ($autenticado) {
			$balance = new BlockchainTransactionsController;
			$saldo = 0; //$balance->getBalanceUsuario();
			Session::put('balance', $saldo);
			
			$balance->resetearBalances();
			
			Session::put('id_usuario', Auth::user()->id);
			Session::put('nombre_usuario', Auth::user()->nombre);

			return ['s' => 's'];
		}

		return ['s' => 'n', 'msj' => 'La combinacion de Usuario y Clave no Concuerdan.'];
	}
	public function verificarConfirmacion($credenciales){
		$usuario = Usuario::where('usuario', strtolower($credenciales['usuario']))
							->orWhere('correo', strtolower($credenciales['usuario']))
							->first();
		
		if ($usuario){
			if($usuario->confirmacion == 0){
				return [ 's' => 'n', 'msj'=> 'Esta cuenta no esta verificada'];
			}
			return ['s'=>'s', 'msj'=> true];
		}else{
			return ['s'=>'n', 'msj' => 'El usuario no se encuentra registrado'];
		}
	}
}