@extends('admin::layouts.dashboard')
@section('content')
	

	<?php 
		$columnas_promociones = [
				'Descripcion' => '30',
				'Fecha Desde'  => '30',
				'Fecha Hasta'  => '40',
				'Porcentaje'  => '40',
				'Dias credito'  => '40'
			]
	?>
	<div class="row">
		{!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST']) !!}

			<input type="hidden" id="url" url="{{ url('/') }}" value="{{ url('/') }}">
	 		<div class="col-sm-12 col-md-12 col-xs-12">
		 		<div class="contenedorprinc" style="float: left;margin-top: 25px;">
					<div class="modal-body">
						@stack('filtroDatatable')
						<table id="tabla" class="table table-striped table-hover table-bordered ">
							<thead>
								<tr>
									@foreach($columnas_promociones as $columna => $ancho)
									<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
									@endforeach
								</tr>
							</thead>
							<tbody></tbody>
							<tfoot>
								<tr>
									@foreach($columnas_promociones as $columna => $ancho)
									<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
									@endforeach
								</tr>
							</tfoot>
						</table>
					</div>
		 		</div>
		 	</div>
		{!! Form::close() !!}
	</div>

@endsection
@push('css')
<style type="text/css">
#tabla thead {
    background-color: #5f9fe7 !important;
    color: #fff !important;
    font-weight: bold !important;
    border: 1px solid !important;
}
</style>
@endpush

