var aplicacion, $form, tabla = false;
$(function() {
	aplicacion = new app('formulario', {
		'limpiar' : function(){
			tabla.fnDraw();
		}
	});

	$form = aplicacion.form;

	tabla = datatable('#tabla', {
		ajax: $url + "datatable",
		columns: [{"data":"parametro","name":"parametro"},{"data":"activo","name":"activo"},{"data":"fecha_desde","name":"fecha_desde"}]
	});
	
	$('#tabla').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
	});

	$('#fecha_desde', $form).datepicker();
	$('#fecha_hasta', $form).datepicker();
});