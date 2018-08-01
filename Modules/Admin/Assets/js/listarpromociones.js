var aplicacion, $form, tabla = false, tabla2 = false,  to, $arbol;


$(function() {
	var $urlBase = $('#url').attr('url');
	aplicacion = new app("formulario", {
		'antes' : function(accion){
			if (accion !== 'guardar') return;

			
		},
		'limpiar' : function(){
			tabla.fnDraw();
			
		},
		'buscar' : function(r){
			
		}
	});

	$form = aplicacion.form;

	
	
	tabla = datatable('#tabla', {
		ajax: $url + "datatable",
		columns: [

			{ data: 'descripcion', name: 'descripcion' },
			{ data: 'fechadesde', name: 'fechadesde' },
			{ data: 'fechahasta', name: 'fechahasta' },
			{ data: 'porcentaje', name: 'porcentaje' },
			{ data: 'diascredito', name: 'diascredito' }
		]
	});
	
	$('#tabla').on("click", "tbody tr", function(){
		location.href = $urlBase +'/backend/promociones/buscarpromo/' + this.id;
		//aplicacion.buscar(this.id);
	});
	
});
