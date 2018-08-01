@extends('admin::layouts.dashboard')
@section('content')
	@include('admin::partials.botonera')
    
    @include('admin::partials.ubicacion', ['ubicacion' => ['Saclie']])
    
    @include('admin::partials.modal-busqueda', [
        'titulo' => 'Buscar Saclie.',
        'columnas' => [
            'Cod Clientes' => '1.9230769230769',
			'Descripcion' => '1.9230769230769',
			'Estatus' => '1.9230769230769',
			'Direccion' => '1.9230769230769',
			'Estado' => '1.9230769230769',
			'Ciudad' => '1.9230769230769'
		]
    ])

    <?php 
		$columnas_afiliar = [
			'Cod Clientes' => '1.9230769230769',
			'Descripcion' => '1.9230769230769',
			'Estatus' => '1.9230769230769',
			'Direccion' => '1.9230769230769',
			'Estado' => '1.9230769230769',
			'Ciudad' => '1.9230769230769'
		]
	?>

    <div class="row">
    	{!! Form::open(['id' => 'formulario', 'name' => 'formulario', 'method' => 'POST' ]) !!}
            <div class="col-md-12">
	            <div class="botones" style="margin-bottom: 27px;">
					<button id="btn-afiliar" type="button" class="btn btn-primary">
		    			<i class="fa fa-address-card-o" aria-hidden="true"></i>Solicitudes de Afiliacion
		    		</button>
					<button id="btn-activar" type="button" class="btn btn-primary green">
		    			<i class="fa fa-address-card-o" aria-hidden="true"></i>Activar Usuario Web
		    		</button>
		    	</div>

				<!--información personal-->
					<div class="col-xs-12 subtitulo">
						<h4>Información personal del Cliente</h4>
					</div>

					{{ Form::bsText('ID3', '', [
						'label' => 'ID Fiscal',
						'placeholder' => 'ID Fiscal',
						'required' => 'required'
					]) }}

					<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label for="Pais" class="requerido">País</label>
						<select id="Pais" name="Pais" class='form-control'>
							<option selected value="">Seleccione...</option>
							@foreach($paises as $pais)
								<option value="{{ $pais->Pais }}">{{ $pais->Descrip }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label for="Estado" class="requerido">Estado</label>
						<select class='form-control' id='Estado' name='Estado'>
							<option value=''>Seleccione...</option>
						</select>
					</div>

					<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label for="Ciudad" class="requerido">Ciudad</label>
						<select class='form-control' id='Ciudad' name='Ciudad'>
							<option value=''>Seleccione...</option>
						</select>
					</div>


					{{ Form::bsText('Telef', '', [
						'label' => 'Teléfono',
						'placeholder' => '04140000000',
						'required' => ''
					]) }}

					{{ Form::bsText('Email', '', [
						'label' => 'E-mail',
						'placeholder' => 'correo@ejemplo.com',
						'required' => ''
					]) }}

					{{ Form::bsText('Fax', '', [
						'label' => 'Fax',
						'placeholder' => '',
						'required' => ''
					]) }}

					{{ Form::bsTextarea('Direc1', '', [
						'label' => 'Dirección 1',
						'placeholder' => 'dirección 1',
						'required' => '',
						'class_cont' => 'col-xs-6'
					]) }}

					{{ Form::bsTextarea('Direc2', '', [
						'label' => 'Dirección 2',
						'placeholder' => 'dirección 2',
						'required' => '',
						'class_cont' => 'col-xs-6'
					]) }}
				<!---->
				<!--información del cliente-->
					<div class="col-xs-12 subtitulo">
						<h4>Información del Cliente</h4>
					</div>

					{{ Form::bsText('CodClie', '', [
						'label' => 'Codigo',
						'placeholder' => 'Cod del cliente',
						'required' => 'required'
					]) }}

					<!--
					<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label for="TipoCliente" class="requerido">Tipo de Cliente</label>
						<select class='form-control' id='TipoCliente' name='TipoCliente'>
							<option value=''>Seleccione...</option>
							<option value='J'>Jurídica</option>
							<option value='V'>Natural</option>
						</select>
					</div>
					-->

					<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<label for="Estatus" class="requerido">Estatus</label>
						<select class='form-control' id='Activo' name='Activo'>
							<option value=''>Seleccione...</option>
							<option value=1>Activo</option>
							<option value=0>Inactivo</option>
						</select>
					</div>

					{{ Form::bsSelect('TipoCli', [
						'normal' => 'Normal',
						'premiun' => 'Premiun',
					], '', [
						'label' => 'Tipo de Cliente',
						'required' => 'required'
					]) }}

					<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label for="Descrip" class="requerido">Descripción</label>
						<input class="form-control" placeholder="Descripción del Usuario" required="required" id="Descrip" name="Descrip" type="text" value="">
					</div>
					
					{{ Form::bsText('Represent', '', [
						'label' => 'Representante',
						'placeholder' => 'Representante',
						'required' => ''
					]) }}

					{{ Form::bsText('NIT', '', [
						'label' => 'NIT',
						'placeholder' => '',
						'required' => ''
					]) }}

					{{ Form::bsText('CodZona', '', [
						'label' => 'Código de Zona',
						'placeholder' => '',
						'required' => ''
					]) }}
					
					{{ Form::bsText('CodVend', '', [
						'label' => 'Código de Vendedor',
						'placeholder' => '',
						'required' => ''
					]) }}
					
					{{ Form::bsText('CodConv', '', [
						'label' => 'Código de Convenio',
						'placeholder' => '',
						'required' => ''
					]) }}
					
					{{ Form::bsText('CodFacL', '', [
						'label' => 'Código Tipo de factura',
						'placeholder' => '',
						'required' => ''
					]) }}
					
					{{ Form::bsSelect('TipoPVP', [], '', [
						'label' => 'Tipo de PVP',
						'required' => 'required'
					]) }}
					
					{{ Form::bsText('IntMora', '', [
						'label' => 'Interés de Mora',
						'placeholder' => '',
						'required' => ''
					]) }}

					{{ Form::bsText('EsGranCont', '', [
						'label' => 'Uso Interno',
						'placeholder' => '',
						'required' => ''
					]) }}
					
					{{ Form::bsSelect('EsCredito',[
						'0' => 'No',
						'1' => 'Si',
					], '', [
						'label' => 'Maneja Crédito',
						'placeholder' => '',
						'required' => ''
					]) }}
					
					{{ Form::bsText('LimiteCred', '', [
						'label' => 'Límite de Crédito',
						'placeholder' => '',
						'required' => ''
					]) }}

					{{ Form::bsText('DiasCred', '', [
						'label' => 'Días de Crédito',
						'placeholder' => '',
						'required' => ''
					]) }}

					{{ Form::bsText('EsToleran', '', [
						'label' => 'Tiene Tolerancia',
						'placeholder' => '',
						'required' => ''
					]) }}

					{{ Form::bsText('DiasTole', '', [
						'label' => 'Días de Tolerancia',
						'placeholder' => '',
						'required' => ''
					]) }}
					
					{{ Form::bsText('FechaE', '', [
						'label' => 'Fecha de Inicio',
						'placeholder' => '',
						'required' => ''
					]) }}
					
					{{ Form::bsTextarea('observa', '', [
						'label' => 'Observaciones',
						'placeholder' => '',
						'required' => '',
						'class_cont' => 'col-xs-12'
					]) }}
				<!---->
				<!--Información financiera-->
				<div class="col-xs-12 subtitulo">
					<h4>Información Financiera</h4>
				</div>

				{{ Form::bsText('Saldo', '', [
					'label' => 'Saldo',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('MontoMax', '', [
					'label' => 'Monto Max',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('MtoMaxCred', '', [
					'label' => 'Monto Max de Crédito',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('PagosA', '', [
					'label' => 'Pagos Adelantado',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('PromPago', '', [
					'label' => 'Próximo Pago',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('RetenIVA', '', [
					'label' => 'Maneja Retención',
					'placeholder' => '',
					'required' => ''
				]) }}

				{{ Form::bsText('Descto', '', [
					'label' => '% Descuento',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('FechaUV', '', [
					'label' => 'Fecha Última Venta',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('MontoUV', '', [
					'label' => 'Monto Última Venta',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('NumeroUV', '', [
					'label' => 'Número Última Venta',
					'placeholder' => '',
					'required' => ''
				]) }}

				<!--ultimos pagos-->

				{{ Form::bsText('FechaUP', '', [
					'label' => 'Fecha Último Pago',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('MontoUP', '', [
					'label' => 'Monto Último Pago',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('NumUP', '', [
					'label' => 'Número Último Pago',
					'placeholder' => '',
					'required' => ''
				]) }}
				
				{{ Form::bsText('EsMoneda', '', [
					'label' => 'Utiliza Moneda Referencial',
					'placeholder' => '',
					'required' => ''
				]) }}
			</div>
		{!! Form::close() !!}
    </div>
@endsection



<div id="modal-afiliar" class="modal fade" tabindex="-1" role="dialog">
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
							@foreach($columnas_afiliar as $columna => $ancho)
							<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
						<tr>
							@foreach($columnas_afiliar as $columna => $ancho)
							<th style="width: {{ $ancho }}%;">{{ $columna }}</th>
							@endforeach
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@push('css')
<style type="text/css">
.subtitulo h4 {
    border-bottom: 1px solid #707070;
    font-size: 18px;
    padding-bottom: 10px;
}
</style>
@endpush