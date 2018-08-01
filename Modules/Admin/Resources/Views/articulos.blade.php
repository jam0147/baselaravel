@extends('admin::layouts.dashboard')
@section('content')
	@include('admin::partials.ubicacion', ['ubicacion' => ['articulos']])	
	<?php 
		$columnas = [
			'Codigo Articulo' => '5',
			'Descripcion'  => '30',
			'Existencia'  => '5',
			'Precio Justo'  => '5',
			'Precio al mayor'  => '5',
			'Precio Final'  => '5',
		]
	?>
	<!--@include('admin::partials.botonera')-->
	
	<div class="row">
	 	{!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
			
		{!! Form::close() !!}
		<div class="tabbable-line bg-white boxless tabbable-reversed col-md-12">
				<ul class="nav nav-tabs" style="margin-top: 10px;">
					<li class="active">
						<a href="#tab_0" data-toggle="tab">
							<i class="fa fa-barcode"></i>Consulta de existencia
						</a>
					</li>
					<li>
						<a href="#tab_1" data-toggle="tab">
							<i class="fa fa-info-circle"></i> Últimas entradas
						</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab_0">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
								<input class="btn btn-default consultar" type="button" value="Imprimir">
								<input class="btn btn-default consultar" type="button" value="PDF">
								<input class="btn btn-default consultar" type="button" value="Excel">
								<input class="btn btn-default consultar" type="button" value="CSV">
								<input class="btn btn-default consultar" type="button" value="Copiar">
							</div>
							<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
								<table id="tabla2" class="table table-striped table-hover table-bordered ">
									<thead>
										<tr>
											@foreach($columnas as $columna => $ancho)
											<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
											@endforeach
										</tr>	
									</thead>
									<tbody></tbody>
									<tfoot>
										<tr>
											@foreach($columnas as $columna => $ancho)
											<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
											@endforeach
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab_1">
						<div class="row">
						</div>
					</div>
				</div>
		</div>		
	</div>
	
@endsection

