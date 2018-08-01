@extends('admin::layouts.default')
@section('content')
	@include('admin::partials.botonera')

	@include('admin::partials.ubicacion', ['ubicacion' => ['Bloqueos']])

	{{ Form::bsModalBusqueda([
		'Parametro' => '33.333333333333',
		'Activo' => '33.333333333333',
		'Fecha' => '33.333333333333'
	]) }}
	
	<div class="row">
		{!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
			{{ Form::bsText('parametro', '', [
				'label' => 'Parametro',
				'placeholder' => 'Parametro'
			]) }}
			{{ Form::bsSelect('activo', [true => 'Si', false => 'No'], '', [
				'label' => 'Bloquear?',
				'class'=>'bs-select'
			]) }}
			{{ Form::bsText('fecha_desde', '', [
				'label' => 'Desde',
				'placeholder' => 'Fecha de inicio de bloqueo'
			]) }}
			{{ Form::bsText('fecha_hasta', '', [
				'label' => 'Hasta',
				'placeholder' => 'Fecha de final de bloqueo'
			]) }}
			{{ Form::bsText('tipoNomina', '', [
				'label' => 'Bloquear por Nomina (codigo)',
				'placeholder' => 'Escriba las nominas separadas por ,'
			]) }}
		{!! Form::close() !!}
	</div>
@endsection