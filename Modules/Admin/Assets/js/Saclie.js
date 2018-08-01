var aplicacion, $form, tabla = false, tabla2 = false,  to, $arbol;

$(function() {
	aplicacion = new app("formulario", {
		/* 'antes' : function(accion){
			if (accion !== 'guardar') return;

			
		}, */
		'limpiar' : function(){
			tabla.fnDraw();
			tabla2.fnDraw();
			$('#btn-activar').hide();
			
		},
		'buscar' : function(r){
			console.log(r.usuario_id);
			if(parseInt(r.usuario_id) > 0 || r.usuario_id !== null){
				$('#btn-activar').hide();
			}else{
				$('#btn-activar').show();
			}
		}
		
});

	$('#btn-activar').hide();
$form = aplicacion.form;

	tabla = datatable('#tabla', {
		ajax: $url + "datatable",
		columns: [
			{"data":"id","name":"id"},
			{"data":"Descrip","name":"Descrip"},
			{"data":"Activo","name":"Activo"},
			{"data":"Direc1","name":"Direc1"},
			{"data":"Estado","name":"Estado"},
			{"data":"Ciud","name":"Descrip"}
		]
	});
	tabla2 = datatable('#tabla2', {
		ajax: $url + "datatable2",
		columns: [
			{"data":"id","name":"id"},
			{"data":"Descrip","name":"Descrip"},
			{"data":"Activo","name":"Activo"},
			{"data":"Direc1","name":"Direc1"},
			{"data":"Estado","name":"Estado"},
			{"data":"Ciud","name":"Descrip"}
		]
	});
	
	$('#tabla').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
	});
	$('#tabla2').on("click", "tbody tr", function(){
		aplicacion.buscar(this.id);
	});
	$('#btn-afiliar').on("click", function(){
		$('#modal-afiliar').modal('toggle');
	})
	
	$('#btn-activar').on("click", function(){
		$.ajax({
			url : $url + 'activar_usuario/' + $('#CodClie').val(),
			type: 'POST',
			dataType: 'json',
			success: function(r){
				aviso(r);
				if(r.s == 's'){
					$('#btn-activar').hide();
				}
			}
		});
	});

	$('select[name="Pais"]').on('change', function(){
	var Pais =  $(this).val();
	if(Pais == ""){
		 $('select[name="Estado"]').html("<option selected value=''>Seleccione...</option>");
		 return false;
	}
	$.ajax({
		url : $url +'estados/' + Pais,
	 	type : 'POST',
	 	dataType : 'json',
	 	success : function(data,status,xhr) {
			 $('select[name="Estado"]').html(data.estados);
		},
	 	error : function(xhr, status) {
		},
	 });
});	
$('select[name="Estado"]').on('change', function(){
	var Estado =  $(this).val();
	var Pais =  $('select[name="Pais"]').val();

	if(Estado == ""){
		 $('select[name="Ciudad"]').html("<option selected value=''>Seleccione...</option>");
		 return false;
	}
	$.ajax({
		url : $url +'ciudad/' + Pais + '/' + Estado,
	 	type : 'POST',
	 	dataType : 'json',
	 	success : function(data,status,xhr) {
			 $('select[name="Ciudad"]').html(data.ciudad);
		},
	 	error : function(xhr, status) {
		},
	 });
});
$('select[name="Ciudad"]').on('change', function(){
	var Estado =  $('select[name="Estado"]').val();
	var Pais =  $('select[name="Pais"]').val();
	var Ciudad =  $(this).val();
	
	if(Ciudad == ""){
		 $('select[name="Municipio"]').html("<option selected value=''>Seleccione...</option>");
		 return false;
	}
	$.ajax({
		url : $url +'municipio/' + Pais + '/' + Estado + '/' + Ciudad,
	 	type : 'POST',
	 	dataType : 'json',
	 	success : function(data,status,xhr) {
			 $('select[name="Municipio"]').html(data.municipio);
		},
	 	error : function(xhr, status) {
		},
	 });
});	
});