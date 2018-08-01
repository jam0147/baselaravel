@extends('admin::layouts.default')
@section('content')
	<ul class="page-breadcrumb breadcrumb">
		<li>
			<a href="{{ url('escritorio') }}">Inicio</a><i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Perfil de Usuario</span>
		</li>
	</ul>
	<div class="container">
		<div class="page-content-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="profile-sidebar">
						<div class="portlet light profile-sidebar-portlet col-md-3">
							<div class="mt-element-overlay">
								<div class="row">
									<div class="col-md-12">
										<div class="mt-overlay-6">

											@if(is_file('public/img/usuarios/' . $usuario->foto))
												<img src="{{ url("public/img/usuarios/".$usuario->foto) }}" class="img-responsive" alt="">  
											@else
												<img alt=""  src="{{ url('public/img/usuarios/user.png') }}" class="img-responsive">
											@endif

											<div class="mt-overlay">
											
	                                            <h2> </h2>
	                                            <p>
		                                            <form id="img" enctype="multipart/form-data"  autocomplete="off">
		                                            	
		                                            	<input id="upload" name="foto" type="file"/>
														<a href="#" id="upload_link" class="mt-info uppercase btn default btn-outline">Cargar Foto de Perfil</a>
													</form>
	                                            </p>
                                        	 </div>
                                        </div>
                                    </div>
								</div>
							</div>
		
							<div class="profile-usertitle">
								<div class="profile-usertitle-name"> {{ $usuario->nombre }} <span id="ape"> </span> </div>
								<div class="profile-usertitle-job"> {{ $usuario->usuario }} </div>
							</div>

							
							<br>
						</div>
					</div>	
					<div class="profile-content col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light ">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Perfil de Usuario</span>
										</div>
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Informacion Personal</a>
											</li>
											<li>
												<a href="#tab_1_2" data-toggle="tab">Cambio de Clave</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
                                        <div class="tab-content">
											<div class="tab-pane active" id="tab_1_1">
												<form role="form" id="form1" autocomplete="off">
													<input type="hidden" name="id" id="id" value="{{ $usuario->id }}">
													<div class="form-group">
														<label class="control-label">C&eacute;dula</label>
														<input name="cedula" placeholder="C&eacute;dula del usuario" value="{{ $usuario->cedula }}" class="form-control" type="text" />
													</div>
													<div class="form-group">
														<label class="control-label">Nombre</label>
														<input type="text"  name="nombre" value="{{ $usuario->nombre }}" placeholder="Nombre del usuario" class="form-control" /> 
													</div>
													<div class="form-group">
														<label class="control-label">Apellido</label>
														<input type="text" placeholder="Apellido" name="apellido" id="apellido"  value="" class="form-control" /> 
													</div>
													<div class="form-group">
														<label class="control-label">Sexo</label>
														<select name="sexo" id ="sexo" class="form-control">
															<option value="">Seleccione...</option>
															<option value="f">Femenino</option>
															<option value="m">Masculino</option>
														</select>
													</div>
													<div class="form-group">
														<label class="control-label">Estado Civil</label>
														<select name="estado" id="estado" class="form-control">
															<option value="">Seleccione...</option>
															<option value="so">Soltero</option>
															<option value="di">Divorciado</option>
															<option value="vi">Viudo</option>
															<option value="ca">Casado</option>
															<option value="co">Concubino</option>
														</select>
													</div>

													<div class="form-group">
														<label class="control-label">Correo</label>
														<input type="email" placeholder="Correo" value="{{ $usuario->correo }}" name="correo" class="form-control" /> 
													</div>
													<div class="form-group">
														<label class="control-label">Tel&eacute;fono</label>
														<input type="phone" id="telefono" name="telefono" placeholder="Tel&eacute;fono" value="{{ $usuario->telefono }}" class="form-control" /> 
													</div>
													<div class="form-group">
														<label class="control-label">Dirección</label>
														<textarea class="form-control" placeholder="Dirección"  rows="3" value="" id="direccion" name="direccion"></textarea>
													</div>
													<div class="form-group">
														<label class="control-label">Facebook</label>
														<input type="text" id="fb" placeholder="Facebook" name="fb" class="form-control" />
													</div>
													<div class="form-group">
														<label class="control-label">Instagram</label>
														<input type="text"  placeholder="Instagram"  name="instagram" id="instagram" class="form-control" />
													</div>
													<div class="form-group">
														<label class="control-label">Twitter</label>
														<input type="text" placeholder="Twitter"  id="tw" name="tw" class="form-control" />
													</div>
													<div class="margiv-top-10">
													<input type="submit" class="btn green"   value="Guardar">
													</div>
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->
											<!-- CHANGE AVATAR TAB -->
											
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane" id="tab_1_2">
												<form id="form2">
													<div class="form-group">
														<label class="control-label">Nueva Contrase&ntilde;a</label>
														<input type="password" name="password" class="form-control" /> 
													</div>
													<div class="form-group">
														<label class="control-label">Repita Nueva Contrase&ntilde;a </label>
														<input type="password"  name="password_confirmation" class="form-control" /> 
													</div>
													<div class="margin-top-10">
														<input type="submit" class="btn green"   value="Guardar">
													</div>
												</form>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
                                        </div>
                                    </div>    
								</div>
							</div>
						</div>
					</div>			
				</div>		
			</div>	
		</div>
	</div>	
@endsection
@push('css')
<style type="text/css">
	#upload_link{
    text-decoration:none;
	}
	#upload{
    display:none
	}
	.mt-element-overlay .mt-overlay-6 {
	    background: #003f8c none repeat scroll 0 0;
	}
	.mt-overlay-6 img{
		min-height: 250px;
	}
</style>
@endpush


