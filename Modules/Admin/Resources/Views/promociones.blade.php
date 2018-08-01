@extends('admin::layouts.dashboard')
@section('content')


	@include('admin::partials.modal-busqueda', [
		'titulo' => 'Buscar Promociones.',
		'columnas' => [
			'Descripcion' => '30',
			'Fecha desde'  => '30',
			'Fecha hasta'  => '40',
			'Porcentaje'  => '40',
			'Dias credito'  => '40'
		]
	])
	<?php 
		$columnas_almacen = [
				'Cod Almacen' => '10',
				'Descripcion' => '100'
			]
	?>
	@include('admin::partials.botonera')
	
	<div class="row">
		{!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST']) !!}
	 		<div class="col-sm-12 col-md-12 col-xs-12">
		 		<div class="contenedorprinc" style="float: left;margin-top: 25px;">
					{{ Form::bsText('descripcion', '', [
						'label' 		=> 'Descripcion',
						'placeholder' 	=> 'Descripcion',
						'required' 		=> 'required'
					]) }}
					{{ Form::bsText('fechadesde', '', [
						'label' 		=> 'Fecha desde',
						'placeholder' 	=> 'Fecha desde',
						'required' 		=> 'required'

					]) }}
					{{ Form::bsText('fechahasta', '', [
						'label' 		=> 'Fecha hasta',
						'placeholder' 	=> 'Fecha hasta',
						'required' 		=> 'required'
					]) }}
					{{ Form::bsText('porcentaje', '', [
						'label' 		=> 'Porcentaje de descuento',
						'placeholder' 	=> 'Porcentaje de descuento',
						'required' 		=> 'required'
					]) }}
					{{ Form::bsText('diascredito', '', [
						'label' 		=> 'Dias de Credito',
						'placeholder' 	=> 'Dias de Credito',
						'required' 		=> 'required'
					]) }}
					{{ Form::bsText('codalmacen', '', [
						'label' 		=> 'Codigo de Almacen',
						'placeholder' 	=> 'Codigo de Almacen',
						'required' 		=> 'required'
					]) }}
					{{ Form::bsText('Descripciondep', '', [
						'label' 		=> 'Descripcion del Almacen',
						'placeholder' 	=> 'Descripcion del Almacen',
						'required' 		=> 'required'
					]) }}
		 		</div>
		 	</div>
		{!! Form::close() !!}
	</div>
	


<div id="modal-almacenes" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog container">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Solicitud de Activacion</h4>
			</div>
			<div class="modal-body">
				@stack('filtroDatatable')
				<table id="tabla2" class="table table-striped table-hover table-bordered ">
					<thead>
						<tr>
							@foreach($columnas_almacen as $columna => $ancho)
							<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
						<tr>
							@foreach($columnas_almacen as $columna => $ancho)
							<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
							@endforeach
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@push('js')
<script>
$url = '{{ route("admin.promociones") }}/';

</script>
@endpush