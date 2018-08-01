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
			$('#Descripciondep').val(r.descripalmacen.Descrip);
			if(r.data){
				console.log(r.data);
			}
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
	tabla2 = datatable('#tabla2', {
		ajax: $url + "datatable2",
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'Descrip', name: 'Descrip' }
			
		]
	});
	$('#codalmacen').click(function(){
		$('#modal-almacenes').modal("show");
	});
	$('#tabla').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
	});
	$('#tabla2').on("click", "tbody tr", function(){
		$.ajax({
			url : $url +'buscar_almacen/' + this.id,
		 	type : 'POST',
		 	dataType : 'json',
		 	success : function(data,status,xhr) {
				$('#codalmacen').val(data.almacen.id);
				$('#Descripciondep').val(data.almacen.Descrip);
				$('#modal-almacenes').modal("hide");
			},
		 	error : function(xhr, status) {
			},
		});
	});
	$('#fechadesde', $form).datepicker();
	$('#fechahasta', $form).datepicker();
});
