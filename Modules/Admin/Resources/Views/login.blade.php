<?php
$controller = app('Modules\Admin\Http\Controllers\Controller');
$controller->css[] = 'login.min.css';
$controller->libreriasIniciales = [
	'OpenSans', 'font-awesome', 'simple-line-icons', 
	'jquery-easing', 'jquery-migrate',  'animate', 'bootstrap', 'bootbox', 'pace', 'jquery-form', 'blockUI', 'jquery-shortcuts',  'pnotify', 'fastclick','chartjs','gauge','nprogress','icheck','skyicons','bootstrap-progressbar','jqvmap', 'moment','bootstrap-daterangepicker', 'init-front'
];
$controller->librerias = [
	'alphanum',
	'maskedinput',
	'datatables',
	'ckeditor',
	'jquery-ui',
	'jquery-ui-timepicker',
	'file-upload',
	'jcrop',
	'template'
	
];

$data = $controller->_app();
extract($data);

$html['titulo'] = 'Inicio de Sesión';
?>
<!DOCTYPE html>
<!--[if IE 8]>    <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>    <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--><html lang="es"><!--<![endif]-->
<head>
	@include('admin::partials.head') 
</head><!--/head-->

	<body class="login">
		<div id="login2">
			<div class="logo">
				<a href="{{ url(\Config::get('admin.prefix')) }}">
					<img src="{{ asset('public/img/logos/logoblanco.png') }}" alt="Logo" />
				</a>
			</div>
			<div class="content">
				{!! Form::open(array('id' => 'formulario', 'url' => 'login')) !!}
					<h3 class="form-title" style="color:#2d2d2d!important;">{{ Lang::get('login.log_in') }}</h3>

					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">{{ Lang::get('login.user') }}</label>
						{!! Form::text('nombre', '', ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => Lang::get('login.user')]) !!}
					</div>

					<div class="form-group">
						<label class="control-label visible-ie8 visible-ie9">{{ Lang::get('login.password') }}</label>
						{!! Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => Lang::get('login.password')]) !!}
					</div>

					<label class="rememberme check mt-checkbox mt-checkbox-outline">
						{!! Form::checkbox('recordar', '1', false) !!}
						{{ Lang::get('login.remember_me') }}
						<span></span>
					</label>

					<div class="form-actions" style="text-align: center;">
						{!! Form::button(Lang::get('login.log_in'), ['class' => 'btn uppercase']) !!}
					</div>

					<div class="create-account">
						<p>2017 &copy; Todos los derechos reservados</p>
					</div>
				{!! Form::close() !!}
			</div>
			
			@include('admin::partials.footer')
		</div>
	</body>
</html>