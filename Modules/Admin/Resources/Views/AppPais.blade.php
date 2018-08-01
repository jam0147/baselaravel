@extends('admin::layouts.default')
@section('content')
	@include('admin::partials.botonera')

	@include('admin::partials.ubicacion', ['ubicacion' => ['App Pais']])

	{{ Form::bsModalBusqueda([
		'Nombre' => '50',
		'Lenguaje' => '50'
	]) }}
	
	<div class="row">
		{!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
		
			{{ Form::bsText('nombre', '', [
				'label' => 'Nombre',
				'placeholder' => 'Nombre',
				'required' => 'required'
			]) }} 
			{{ Form::bsText('lenguaje', '', [
				'label' => 'Lenguaje',
				'placeholder' => 'Lenguaje',
				'required' => 'required'
			]) }}
		{!! Form::close() !!}
	</div>
@endsection