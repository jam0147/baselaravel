$.ajaxSetup({
	headers: { 
		'X-CSRF-TOKEN' : $('meta[name=csrf-token]').attr('content')
	},
	complete:function(x,e,o){
		$("#cargando").animate({opacity:0}, {queue:false, complete:function(){
			$(this).css({display: 'none'});
		}});
	},
	error: function(r){
		var res = r.responseJSON, html = "";

		for (var i in res) {
			html += res[i].join("<br />") + "<br />";
		}
		console.log(r.msj);
		$('#mennsaje_validacion').text(r.msj);
		/*new PNotify({
			title: 'Error de validacion',
			text: html,
			type: 'error',
			hide: true
		});*/
	},
	timeout: 0,
	cache: false
});

var app = {
	form : '',
	nombre : '',
	password : '',

	init : function(){
		this.form = $("#formulario");
		this.nombre = $("input[name='nombre']", this.form).val('').focus();
		this.password = $("input[name='password']", this.form).val('');
		this.recordar = $("input[name='recordar']", this.form);
		
		$("button", this.form).click(this.validarAuth);

		this.form.submit(function(){
			return false;
		});

		$(".form-control", this.form).keypress(this.validarAuth);
	},

	validarAuth : function(e){
		if(e.type == 'click' || e.which == 13){
			app._validarAuth();
		}
	},

	_validarAuth : function(){
		if (this.nombre.val() === ''){
			this.nombre.focus();
		}else if (this.password.val() === ''){
			this.password.focus();
		}else{
			this.buscar();
		}
	},

	buscar : function(){
		$("#boton").prop("disable", true);
		$('#mensaje_validacion').hide();

		$.ajax($url + 'validar',{
			type: "POST",
			data: {
				usuario : this.nombre.val(),
				password : this.password.val(),
				recordar : this.recordar.prop("checked"),
				data	: this.form.serialize()
			},
			
			success: function(r){
				if (r.s === "s"){
					$('#mensaje_validacion').text("Autenticación correcta");
					$('#mensaje_validacion').removeClass("alert-danger").addClass("alert-success");
					
					setTimeout(function(){
						location.href = $url.replace(/\/+$/,'');
					}, 2000);
				}

				if (r.s === "n"){
					$('#mensaje_validacion').text(r.msj);
					$("#boton").prop("disable", false);
					grecaptcha.reset();
				}

				$('#mensaje_validacion').show();


				setTimeout(function(){
					$('#mensaje_validacion').hide();
				}, 10000);
			}
		});
	}
};

app.init();

function avisoModal(msj, cerrarAuto, tiempo){
	$t 	= 3000;
	
	$(".textoModal", "#avisoModal").html(msj);

	$("#avisoModal").modal("show");

	if (cerrarAuto === undefined || cerrarAuto == true) {
		if(tiempo != undefined && tiempo > 0)
			$t = tiempo;
		
		setTimeout(function(){
			$("#avisoModal").modal("hide");
		}, $t);
	}
}