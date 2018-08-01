var aplicacion, $form, tabla = false, tabla2 = false,  to, $arbol;

$(function() {
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

	
	
	tabla = datatable('#tabla2', {
		ajax: $url + "datatable",
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'descrip', name: 'descrip' },
			{ data: 'Existen', name: 'Existen' },
			{ data: 'CostAct', name: 'CostAct' },
			{ data: 'CostPro', name: 'CostPro' },
			{ data: 'Precio3', name: 'Precio3' }
		]
	});
	$('#tabla2').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
	});
	
});
