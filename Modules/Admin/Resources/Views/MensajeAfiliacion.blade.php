<?php
$controller = app('Modules\Admin\Http\Controllers\Controller');


$html['titulo'] = 'Mensajes de confirmación de afiliacion';
?>
<!DOCTYPE html>
<html lang="es">
<head>
</head><!--/head-->

	<body class="login">
		<div class="logo">
			<label>D R O D O C A</label>
		</div>
		<div class="content">
			
				<h3 class="form-title font-green">{{$title}}</h3>

				<div class="panel panel-default">
					<div class="panel-body">
						<p>Estimado Usuario Reciba un cordial saludo, 
		    				el presente correo es para confirmar que sus datos fueron 
		    				enviados exitosamente!!!. su contraseña temporal es: {{ $claveTemporal }}, recuerde cambiarla despues de ingresar al sistema. Muchas gracias!!! </p>
					</div>
				</div>
				
			
			
		</div>

	</body>
</html>
		