var aplicacion, $arbol, to, $eliminados = [], $id = 0;

$(function() {
	$('#nombre').alpha({
		allow : '-_'
	});

	$('#direccion').alpha({
		allow : '#-_/',
		allowSpace : false,
	});

	$('#limpiar', '#botonera').on('click', function(){
		limpiar();
	});

	$('#guardar', '#botonera').on('click', function(){
		guardar();
	});

	$('#eliminar', '#botonera').on('click', function(){
		eliminarData();
	});

	$('#buscar', '#botonera').on('click', function(){
		buscar();
	});

	$('#agregar', '#botonera').on('click', function(){
		agregar();
	});

	$('#modificar', '#botonera').prop('disabled', true).on('click', function(){
		modificar();
	});

	arbol();

	$('#input_buscar').keyup(function () {
		if(to) { clearTimeout(to); }
		to = setTimeout(function () {
			$arbol.search($('#input_buscar').val());
		}, 250);
	});
});

function limpiarCampos(){
	$('#nombre, #direccion, #icono').val('');
	$eliminados = [];
	$id = 0;

	$('#modificar', '#botonera').prop('disabled', true);
}

function limpiar(){
	limpiarCampos();
	arbol();

	$arbol.deselect_all();
}

function agregar(){
	var ref = $arbol,
		sel = ref.get_selected();

	if(!sel.length) {
		aviso('debe seleccionar un elemento del Menu');
		return false;
	}

	sel = sel[0];
	sel = ref.create_node(sel, {
		'text' : $('#nombre').val(),
		'li_attr' : {
			'data-direccion' : $('#direccion').val()
		},
		'icon' : $('#icono').val()
	});

	if(!sel) {
		aviso('No se pudo crear el elemento');
	}else{
		limpiarCampos();
	}
}

function guardar(){
	$.ajax({
		url : $url + 'crear',
		data : {
			data : arbol_data(),
			eliminados : $eliminados
		},
		'type' : 'POST',
		success : function(r){
			aviso(r);
			limpiar();
		}
	});
}

function eliminarData($valor){
	var $valor = $arbol.get_selected();
		if(!$valor.length) { return false; }


	var $_data = $arbol.get_json($valor, {flat : true});

	for(var i in $_data){
		console.log($_data[i].id, $_data[i].id.substring(0, 1));
		if ($_data[i].id.substring(0, 1) != 'j'){
			$eliminados.push($_data[i].id);
		}
	}

	$arbol.delete_node($valor);
}

function arbol_data(){
	var $_data = $arbol.get_json('#', {flat : true}),
	$data = [],
	$padre = [],
	direccion = '';

	for(var i in $_data){
		if (i == 0){
			continue;
		}

		if ($padre[$_data[i].parent] == undefined){
			$padre[$_data[i].parent] = 0;
		}else{
			$padre[$_data[i].parent]++;
		}

		direccion = $_data[i].li_attr['data-direccion'];
		direccion = direccion == '' ? '#' : direccion;

		$data.push({
			id : $_data[i].id,
			padre : $_data[i].parent,
			nombre : $_data[i].text,
			direccion : direccion,
			icono : $_data[i].icon,
			posicion : $padre[$_data[i].parent]
		});
	}

	return $data;
}

function buscar(){
	var $sel = $arbol.get_selected();

	$data = $arbol.get_json($sel);

	$id = $data.id;

	$('#nombre').val($data.text);
	$('#direccion').val($data.li_attr['data-direccion']);
	$('#icono').val($data.icon);

	$('#modificar', '#botonera').prop('disabled', false);
}

function modificar(){
	var $nodo = $arbol.get_node($id);

	$arbol.set_text($id, $('#nombre').val());
	$nodo.li_attr['data-direccion'] = $('#direccion').val();
	$arbol.set_icon($id, $('#icono').val());

	limpiarCampos();
}

function arbol(){
	$.ajax({
		url : $url + 'arbol',
		success : function(r){
			var data = r

			$('#arbol')
			.html('')
			.jstree('destroy')
			.on('changed.jstree', function (e, data) {
				//$('#padre').val(data.instance.get_node(data.selected[0]).id);
				//aplicacion.id = data.instance.get_node(data.selected[0]).id;
			})

			.jstree({
				'core' : {
					'animation' : 0,
					'check_callback' : true,
				    'themes' : { 'stripes' : true },
				    'force_text' : true,
					'multiple' : true,
					'data' : data
				},
				'types' : {
					'default' : {
						'icon' : '',
						'valid_children' : ['default','file']
					},
					'todo' : {
						'icon' : 'fa fa-sitemap',
						'valid_children' : []
					},
				},
				'plugins' : [
					'dnd', 'search', 'state', 'types'
				]
			});

			$arbol = $('#arbol').jstree(true);
		}
	});
}

function is_numeric(input) {
	return (input - 0) == input && input.length > 0;
}