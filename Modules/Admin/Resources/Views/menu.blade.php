@extends('admin::layouts.dashboard')

@push('botones')
	<button id='agregar' class='btn btn-app btn-info' title='{{ Lang::get('backend.btn_group.add.title') }}'>
		<i class='fa fa-plus'></i>
		<span class='visible-lg-inline visible-md-inline'>{{ Lang::get('backend.btn_group.add.btn') }}</span>
	</button>

	<button id='modificar' class='btn btn-app btn-info' title='Modificar'>
		<i class='fa fa-pencil-square-o'></i>
		<span class='visible-lg-inline visible-md-inline'>Modificar</span>
	</button>
@endpush

@section('content')
	@include('admin::partials.botonera')

	<ul class="page-breadcrumb breadcrumb">
		<li>
			<a href="{{ url(\Config::get('admin.prefix')) }}">Inicio</a><i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Administrador</span><i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Men&uacute;</span>
		</li>
	</ul>

	<div class='row'>
		{{ Form::bsText('nombre', '', [
			'label' 		=> 'Nombre',
			'placeholder' 	=> 'Nombre',
			'required' 		=> 'required'
		]) }}

		{{ Form::bsText('direccion', '', [
			'label' 		=> 'Direcci&oacute;n',
			'placeholder' 	=> 'Direcci&oacute;n',
			'required' 		=> 'required'
		]) }}

		{{ Form::bsText('icono', '', [
			'label' 		=> 'Icono',
			'placeholder' 	=> 'Icono'
		]) }}

		<div class='form-group col-sm-12'>
			<label for='input_buscar'>Menu:</label>
			<input id='input_buscar' class='form-control' type='text' placeholder='Buscar' value='' /><br />

			<div id='arbol'></div>
		</div>
	</div>
@endsection