@extends('admin::layouts.dashboard')
@section('content')
	@include('admin::partials.botonera')

	@include('admin::partials.ubicacion', ['ubicacion' => ['Usuarios']])

	@include('admin::partials.modal-busqueda', [
		'titulo' => 'Buscar Usuarios.',
		'columnas' => [
			'Usuario' => '30',
			'Cedula'  => '30',
			'Nombre'  => '40'
		]
	])

	<div class="row">
		<form id="formulario" name="formulario" enctype="multipart/form-data" method="POST" autocomplete="off">
			<div class="profile-sidebar col-md-3" style="margin-bottom: 35px;">
				<div class="portlet light profile-sidebar-portlet ">
					<div class="mt-element-overlay">
						<div class="row">
							<div class="col-md-12">
								<div class="mt-overlay-6">
									<img  id="foto" src="{{ url('public/img/usuarios/user.png') }}" class="img-responsive" alt="">
									<div class="mt-overlay">
										<h2> </h2>
										<p>
											<input id="upload" name="foto" type="file" />
											<a href="#" id="upload_link" class="mt-info uppercase btn default btn-outline">
												<i class="fa fa-camera"></i>
											</a>
										</p>
									</div>
									<h4 style="color:#fff;font-weight:bold;">Imagen de perfil</h4>
								</div>
							</div>
						</div>
					</div>
					<br />
				</div>
			</div>

			<div class="tabbable-line bg-white boxless tabbable-reversed col-md-9">
				<ul class="nav nav-tabs" style="margin-top: 10px;">
					<li class="active">
						<a href="#tab_0" data-toggle="tab">
							<i class="fa fa-user"></i> Usuario 
						</a>
					</li>
					<li>
						<a href="#tab_1" data-toggle="tab">
							<i class="fa fa-info-circle"></i> Informaci&oacute;n Personal
						</a>
					</li>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="tab_0">
						<div class="row">
							{{ Form::hidden('permisos', '', ['id' => 'permisos']) }}

							{{ Form::bsText('usuario', '', [
								'label' => 'Usuario',
								'placeholder' => 'Login del Usuario',
								'required' => 'required'
							]) }}

							{{ Form::bsPassword('password', '', [
								'label' => 'Contrase&ntilde;a',
								'placeholder' => 'Contrase&ntilde;a del Usuario',
								'required' => 'required'
							]) }}

							{{ Form::bsSelect('perfil_id', $controller->perfiles(), '', [
								'label' => 'Perfil',
								'required' => 'required'
							]) }}

							@if ($usuario->super === 's')
								{{ Form::bsSelect('super', [
									'n' => 'No',
									's' => 'Si',
								], 'n',
								[
									'label' => '&iquest;Es Super Usuario?',
									'required' => 'required'
								]) }}
							@endif
							<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
							    <label for="estado_id" class="requerido">Pais </label>
							    <select class="form-control" required="required" id="app_pais_id" name="app_pais_id">
							    	<option selected="selected" disabled="disabled" hidden="hidden" value="">- Seleccione</option>
							    	@foreach($pais as $pais)
							    		<option value="{{$pais->id}}">{{$pais->nombre}}</option>
								   	@endforeach
							    </select>
							    
							</div>
							<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
							    <label for="wallet" class="requerido">Wallet </label>
							    <input type="text" id="wallet" name="wallet" class="form-control" type="text" placeholder="Wallet" value="">
							</div>
							<div class="form-group col-lg-3 col-md-4 col-sm-6 col-xs-12">
							    <label for="confirmacion" class="requerido">Confirmado </label>
							    <input type="checkbox" id="confirmacion" name="confirmacion" value="true">
							</div>
							<div class="form-group col-xs-12">
								<label for="arbol">Permisos:</label>
								<input id="input_buscar" name="input_buscar" class="form-control" type="text" placeholder="Buscar" value="" /><br />
								<div id="arbol"></div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab_1">
						<div class="row">

							{{ Form::bsText('dni', '', [
								'label' => 'C&eacute;dula',
								'placeholder' => 'C&eacute;dula del Usuario',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12',
								'required' => 'required'
							]) }}

							{{ Form::bsText('nombre', '', [
								'label' => 'Nombre',
								'placeholder' => 'Nombre del Usuario',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12',
								'required' => 'required'
							]) }}

							{{ Form::bsText('apellido', '', [
								'label' => 'Apellido',
								'placeholder' => 'Apellido del Usuario',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12',
							]) }}

							{{ Form::bsText('correo', '', [
								'label' => 'Correo',
								'placeholder' => 'Correo Electronico del Usuario',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12',
							]) }}

							{{ Form::bsText('telefono', '', [
								'label' => 'Tel&eacute;fono',
								'placeholder' => 'Tel&eacute;fono del Usuario',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12',
							]) }}

							{{ Form::bsSelect('sexo', [
									'f' => 'Femenino',
									'm' => 'Masculino'
								], '', [
								'label' => 'Sexo',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12'
							]) }}

							{{ Form::bsSelect('edo_civil', [
									'so' => 'Soltero',
									'di' => 'Divorciado',
									'vi' => 'Viudo',
									'ca' => 'Casado',
									'co' => 'Concubino',
								], '', [
								'label' => 'Estado Civil',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12'
							]) }}

							<div class="col-sm-12"></div>

							{{ Form::bsText('facebook', '', [
								'label' => 'Facebook',
								'placeholder' => 'Facebook del Usuario',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12'
							]) }}

							 {{ Form::bsText('instagram', '', [
								'label' => 'Instagram',
								'placeholder' => 'Instagram del Usuario',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12'
							]) }}

							{{ Form::bsText('twitter', '', [
								'label' => 'Twitter',
								'placeholder' => 'Twitter del Usuario',
								'class_cont' => 'col-md-4 col-sm-6 col-xs-12'
							]) }}

							<div class="form-group col-sm-12">
								<label class="control-label">Dirección</label>
								<textarea id="direccion" name="direccion" class="form-control" placeholder="Dirección" rows="3" value="" style="width: 100%; height: 70px;"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection

@push('js')
<script>
var imagenDefault = "{{ url('public/img/usuarios/user.png') }}";
</script>
@endpush