<?php

return [
	'name' 	=> 'Admin',
	'prefix' => 'backend',
	'correo' => env('MAIL_USERNAME'),
	'wallet' => sha1('angel bejarano'),
	'host_rpc' => env('HOST_RPC'), 
	'port_rpc' =>	env('PORT_RPC'),
	'pass_rpc' =>	env('PASS_RPC'),
	'user_rpc' =>	env('USER_RPC'),
	'driver' =>	env('DB_CONNECTION'),

	'games'		=> [
		'wallet' 			=> sha1('angel bejarano'),
		'host_rpc' 			=> '138.197.108.82', 
		'port_rpc' 			=> env('PORT_RPC'),
		'pass_rpc' 			=> '7hQGrkkbfnptkzRNReWAtdeboEwwRMafgzJxLzJWJiXV',
		'user_rpc' 			=> env('USER_RPC'),
		'billetera_temporal' =>	sha1('games billetera temporal onix '),//billetera de onx fotbol
		'billetera_pintto' 	=> sha1('billetera pagos pintto games soft'),//billetera de onx dice
		'billetera_central'	=>  sha1('billetera central pintto sonf games'),//billetera del centro de ventas para pagar ordenes
		'billetera_centro_ventas'	=>  sha1('billetera centro ventas para las ventas de onx generadas por los usuarios regulares'),//billetera donde los vendedores de onx depositan las monedas
		'billetera_centro_ventas_fee'	=>  sha1('billetera centro fee comisiones de la red de onx generadas por los usuarios regulares'),//billetera de fees 
	],
	'libreriaEntorno' => 'interna', //interna, externa
	'librerias' => [
		'externa' => [
			'init' => [
				'css' => [
					'components.min.css',
					'layout.min.css',
					'themes/default.min.css',
					'custom.min.css',
					'backend.css',
					'plugins.min.css'
				],
				'js' => [
					'init_plantilla.js',
					'init.js',
					'funciones.js'
				]
			],
			'init-front' => [
				'js' => [
					'init_plantilla.js',
					'init.js',
					'funciones.js'
				]
			],
			'flipclock' => [
				'css' => [
					'flipclock/css/flipclock.css',
				],
				'js' => [
					'flipclock/js/flipclock.js',
				]
			],
			'ie' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js'
				]
			],
			'OpenSans' => [
				'css' => [
					'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all'
				]
			],
			'vue' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js'
				]
			],
			'vue-strap' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/vue-strap/1.0.11/vue-strap.min.js'
				]
			],
			'vue-router' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/vue-router/0.7.13/vue-router.min.js'
				]
			],
			'vue-resource' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.9.3/vue-resource.common.js',
					'https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.9.3/vue-resource.min.js'
				]
			],
			'vue-validator' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/vue-validator/2.1.6/vue-validator.common.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/vue-validator/2.1.6/vue-validator.min.js'
				]
			],
			'jquery' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js'
				]
			],
			'jquery2' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'
				]
			],
			'jquery-easing' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'
				]
			],
			'jquery-migrate' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.4.1/jquery-migrate.min.js'
				]
			],
			'font-awesome' => [
				'css' => [
					'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css'
				]
			],
			'simple-line-icons' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.1/css/simple-line-icons.css'
				]
			],
			'animate' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.css'
				]
			],
			'bootstrap' => [
				'css' => [
					'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
					//'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css'
				],
				'js' => [
					'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
				]
			],
			'bootstrap-front' => [
				'js' => [
					'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
				]
			],
			'bootbox' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js'
				]
			],
			'bootstrap-tagsinput' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css',
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js'
				]
			],
			'bootstrap-fileinput' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.5/css/fileinput.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.5/js/fileinput.min.js'
				]
			],
			'jquery-shortcuts' => [
				'js' => [
					'http://www.stepanreznikov.com/js-shortcuts/jquery.shortcuts.min.js'
				]
			],
			'jquery-cookie' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.2/js.cookie.min.js'
				]
			],
			'jquery-form' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js'
				]
			],
			'blockUI' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js'
				]
			],
			'pace' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-flash.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js'
				]
			],
			'pnotify' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.css',
					'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.buttons.min.css',
					'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.nonblock.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.buttons.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.nonblock.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.confirm.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.0.0/pnotify.animate.min.js'
				]
			],
			'alphanum' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery.alphanum/1.0.24/jquery.alphanum.min.js'
				]
			],
			'maskedinput' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js'
				]
			],
			'datatables' => [
				'css' => [
					//'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/jquery.dataTables.min.css',
					'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js'
				]
			],
			'datatables4' => [
				'css' => [
					//'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/jquery.dataTables.min.css',
					'https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js',
					'https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js'
				]
			],
			'jquery-ui' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/themes/flick/jquery-ui.min.css',
					'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/themes/flick/theme.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js'
				]
			],
			'jquery-ui-timepicker' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.1/jquery-ui-timepicker-addon.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.1/jquery-ui-timepicker-addon.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.1/i18n/jquery-ui-timepicker-es.js'
				]
			],
			'ckeditor' => [
				'js' => [
					'https://cdn.ckeditor.com/4.5.9/full/ckeditor.js'
				]
			],
			'jstree' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.1/themes/default/style.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.1/jstree.min.js'
				]
			],
			'jcrop' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/css/jquery.Jcrop.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/js/jquery.Jcrop.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/js/jquery.color.min.js'
				]
			],
			'template' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-JavaScript-Templates/3.4.0/js/tmpl.min.js',
				]
			],
			'file-upload' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/css/jquery.fileupload.min.css',
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/css/jquery.fileupload-ui.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-JavaScript-Templates/3.4.0/js/tmpl.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-load-image/2.6.1/load-image.all.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/js/jquery.fileupload.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/js/jquery.fileupload-process.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.3.0/js/canvas-to-blob.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/js/jquery.iframe-transport.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/js/jquery.fileupload-validate.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/js/jquery.fileupload-ui.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/js/jquery.fileupload-image.min.js'
					//'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/js/jquery.fileupload-audio.min.js',
					//'https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.12.4/js/jquery.fileupload-video.min.js',
				]
			],
			'bootstrap-switch' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.2/css/bootstrap3/bootstrap-switch.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.2/js/bootstrap-switch.min.js'
				]
			],
			'highcharts' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.6/highcharts.js',
					'https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.6/highcharts-more.js'
				]
			],
			'highcharts-more' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.6/highcharts-more.js'
				]
			],
			'highcharts-drilldown' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.6/modules/drilldown.js'
				]
			],
			'highcharts-3d' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/highcharts/4.2.6/highcharts-3d.js'
				]
			],
			'highmaps' => [
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/highmaps/4.2.6/modules/map.js',
				]
			],
			'icheck' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js'
				]
			],
			'ladda' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/ladda-themeless.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/spin.min.js',
					'https://cdnjs.cloudflare.com/ajax/libs/ladda-bootstrap/0.9.4/ladda.min.js'
				]
			],
			'touchspin' => [
				'css' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.1/jquery.bootstrap-touchspin.min.css'
				],
				'js' => [
					'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.1/jquery.bootstrap-touchspin.min.js'
				]
			],

			'mixitup' => [

				'js' => [
					'jquery.mixitup.js',
				]
			],
			'wow' => [

				'js' => [
					'wow.min.js',
				]
			],
			'placeholdem' => [

				'js' => [
					'placeholdem.min.js',
				]
			],
			'vide' => [

				'js' => [
					'jquery.vide.js',
				]
			],
			'prettyPhoto' => [
				'css' => [
					'prettyPhoto/css/prettyPhoto.css'
				],
				'js' => [
					'prettyPhoto/js/jquery.prettyPhoto.js',
				]
			],
			'smooth-scroll' => [

				'js' => [
					'smooth-scroll.js',
				]
			],
			'waypoints' => [

				'js' => [
					'waypoints.min.js',
				]
			],
			'counterup' => [

				'js' => [
					'jquery.counterup.min.js',
				]
			],
			'countdown' => [

				'js' => [
					'countdown/jquery.countdown.min.js',
				]
			],
			

			'scroll-top' => [

				'js' => [
					'scroll-top.js',
				]
			],
			'lazyload' => [

				'js' => [
					'jquery.lazyload.js',
				]
			],
			'appear' => [

				'js' => [
					'jquery.appear.js',
				]
			],
			'slicknav' => [

				'js' => [
					'jquery.slicknav.js',
				]
			],
			'modernizr' =>[
				'js' => [
					'modernizr/modernizr.2.5.3.min.js',
				]
			],
			'scrollTo' => [

				'js' => [
					'scrollTo/jquery.scrollTo.js',
				]
			],
			'magnific-popup' => [

				'js' => [
					'magnific-popup/jquery.magnific-popup.min.js',
				],
				'css' => [
					'magnific-popup/magnific-popup.css',
				],
			],
			'youtube-popup' => [
				'js' => [
					'youtube-popup/YouTubePopUp.jquery.js',

				],
				'css' => [
					'youtube-popup/YouTubePopUp.css',

				]
			],
			'bootstrap-datetimepicker' => [
				'css' => [
					'bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'
				],
				'js' => [
					'bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'
				]
			]

		],
		'interna' => [
			'init' => [
				'css' => [
					'components.min.css',
					'layout.min.css',
					'themes/default.min.css',
					'custom.min.css',
					'backend.css',
					'plugins.min.css'
				],
				'js' => [
					'init_plantilla.js',
					'init.js',
					'funciones.js'
				]
			],
			'countdown' => [

				'js' => [
					'countdown/jquery.countdown.min.js',
				]
			],
			'flipclock' => [
				'css' => [
					'flipclock/css/flipclock.css',
				],
				'js' => [
					'flipclock/js/flipclock.js',
				]
			], 
	        'init-front' => [
				'js' => [
					'init_plantilla.js',
					'init.js',
					'funciones.js'
				]
			],
			'ie' => [
				'js' => [
					'respond.min.js',
					'excanvas.js'
				]
			],
			'lightwidget' => [
				'js' => [
					'lightwidget.js',	
				]
			],
			'OpenSans' => [
				'css' => [
					'OpenSans/OpenSans.css'
				]
			],
			'vue' => [
				'js' => [
					'vue/vue.min.js'
				]
			],
			'vue-strap' => [
				'js' => [
					'vue/vue-strap.min.js'
				]
			],
			'vue-router' => [
				'js' => [
					'vue/vue-router.min.js'
				]
			],
			'vue-resource' => [
				'js' => [
					'vue/vue-resource.common.js',
					'vue/vue-resource.min.js'
				]
			],
			'vue-validator' => [
				'js' => [
					'vue/vue-validator.common.js',
					'vue/vue-validator.min.js'
				]
			],
			'jquery' => [
				'js' => [
					'jquery-1.12.4.min'
				]
			],
			'jquery2' => [
				'js' => [
					'jquery-2.2.4.min.js'
				]
			],
			'jquery-easing' => [
				'js' => [
					'jquery.easing.min.js'
				]
			],
			'jquery-migrate' => [
				'js' => [
					'jquery-migrate-1.4.1.min.js'
				]
			],
			'font-awesome' => [
				'css' => [
					'font-awesome/css/font-awesome.min.css'
				]
			],
			'simple-line-icons' => [
				'css' => [
					'simple-line-icons/simple-line-icons.min.css'
				]
			],
			'animate' => [
				'css' => [
					'animate/animate.css'
				]
			],
			'bootstrap' => [
				'css' => [
					'bootstrap/css/bootstrap.min.css',
					//'bootstrap/css/bootstrap-theme.min.css'
				],
				'js' => [
					'bootstrap/js/bootstrap.min.js'
				]
			],
			'bootstrap-front' => [
				'js' => [
					'bootstrap/js/bootstrap4.min.js' 
				]
			],
			'bootbox' => [
				'js' => [
					'bootbox/bootbox.min.js'
				]
			],
			'bootstrap-tagsinput' => [
				'css' => [
					'bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css',
					'bootstrap-tagsinput/bootstrap-tagsinput.css'
				],
				'js' => [
					'bootstrap-tagsinput/bootstrap-tagsinput.min.js'
				]
			],
			'bootstrap-fileinput' => [
				'css' => [
					'bootstrap-fileinput/fileinput.min.css'
				],
				'js' => [
					'bootstrap-fileinput/fileinput.min.js'
				]
			],
			'jquery-shortcuts' => [
				'js' => [
					'jquery-shortcuts/jquery.shortcuts.min.js'
				]
			],
			'jquery-cookie' => [
				'js' => [
					'js.cookie.min.js'
				]
			],
			'jquery-form' => [
				'js' => [
					'jquery-form/jquery.form.min.js'
				]
			],
			'blockUI' => [
				'js' => [
					'blockUI/jquery.blockUI.min.js'
				]
			],
			'pace' => [
				'css' => [
					'pace/themes/pace-theme-flash.css'
				],
				'js' => [
					'pace/pace.min.js'
				]
			],
			'pnotify' => [
				'css' => [
					'pnotify/css/pnotify.min.css',
					'pnotify/css/pnotify.buttons.min.css',
					'pnotify/css/pnotify.nonblock.min.css'
				],
				'js' => [
					'pnotify/js/pnotify.min.js',
					'pnotify/js/pnotify.buttons.min.js',
					'pnotify/js/pnotify.nonblock.min.js',
					'pnotify/js/pnotify.confirm.min.js',
					'pnotify/js/pnotify.animate.min.js'
				]
			],
			'alphanum' => [
				'js' => [
					'alphanum/jquery.alphanum.min.js'
				]
			],
			'maskedinput' => [
				'js' => [
					'maskedinput/jquery.maskedinput.min.js'
				]
			],
			'datatables' => [
				'css' => [
					'datatables/datatables.min.css'
				],
				'js' => [
					'datatables/datatables.min.js'
				]
			],
			'datatables4' => [
				'css' => [
					'https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css'
				],
				'js' => [
					'datatables/datatables.min.js',
					'datatables/datatables4.js'
				]
			],
			'jquery-ui' => [
				'css' => [
					'jquery-ui/jquery-ui.min.css',
					'jquery-ui/jquery-ui.structure.min.css',
					'jquery-ui/jquery-ui.theme.min.css'
				],
				'js' => [
					'jquery-ui/jquery-ui.min.js'
				]
			],
			'jquery-ui-timepicker' => [
				'css' => [
					'jquery-ui-timepicker/jquery-ui-timepicker-addon.min.css'
				],
				'js' => [
					'jquery-ui-timepicker/jquery-ui-timepicker-addon.min.js',
					'jquery-ui-timepicker/i18n/jquery-ui-timepicker-es.js'
				]
			],
			'ckeditor' => [
				'js' => [
					'ckeditor/ckeditor.js'
				]
			],
			'jstree' => [
				'css' => [
					'jstree/themes/default/style.min.css'
				],
				'js' => [
					'jstree/jstree.min.js'
				]
			],
			'jcrop' => [
				'css' => [
					'jcrop/css/jquery.Jcrop.min.css'
				],
				'js' => [
					'jcrop/js/jquery.Jcrop.min.js',
					'jcrop/js/jquery.color.min.js'
				]
			],
			'template' => [
				'js' => [
					'tmpl.min.js'
				]
			],
			'file-upload' => [
				'css' => [
					'jquery-file-upload/css/jquery.fileupload.css',
					'jquery-file-upload/css/jquery.fileupload-ui.css'
				],
				'js' => [
					'tmpl.min.js',
					'jquery-file-upload/js/vendor/load-image.min.js',
					'jquery-file-upload/js/jquery.fileupload.js',
					'jquery-file-upload/js/jquery.fileupload-process.js',
					'jquery-file-upload/js/vendor/canvas-to-blob.min.js',
					'jquery-file-upload/js/jquery.iframe-transport.js',
					'jquery-file-upload/js/jquery.fileupload-validate.js',
					'jquery-file-upload/js/jquery.fileupload-ui.js',
					'jquery-file-upload/js/jquery.fileupload-image.js'
					//'jquery-file-upload/js/jquery.fileupload-audio.js',
					//'jquery-file-upload/js/jquery.fileupload-video.js',
				]
			],
			'bootstrap-switch' => [
				'css' => [
					'bootstrap-switch/css/bootstrap-switch.min.css'
				],
				'js' => [
					'bootstrap-switch/js/bootstrap-switch.min.js'
				]
			],
			'highcharts6'	=> [
				'js' 		=> [
					'highcharts6/highcharts.js',
					'highcharts6/modules/exporting.js',
					'highcharts6/modules/export-data.js',
				]
			],
			'highcharts' => [
				'js' => [
					'highcharts/js/highcharts.js',
					'highcharts/js/themes/dark-unica.js',
					'highcharts/js/highcharts-more.js'
				]
			],
			'highcharts-drilldown' => [
				'js' => [
					'highcharts/js/modules/drilldown.js'
				]
			],
			'highcharts-3d' => [
				'js' => [
					'highcharts/js/highcharts-3d.js'
				]
			],
			'highmaps' => [
				'js' => [
					'highmaps/js/modules/map.js'
				]
			],
			'icheck' => [
				'css' => [
					'icheck/skins/all.css'
				],
				'js' => [
					'icheck/icheck.min.js'
				]
			],
			'ladda' => [
				'css' => [
					'ladda/ladda-themeless.min.css'
				],
				'js' => [
					'ladda/spin.min.js',
					'ladda/ladda.min.js'
				]
			],
			'touchspin' => [
				'css' => [
					'touchspin/jquery.bootstrap-touchspin.min.css'
				],
				'js' => [
					'touchspin/jquery.bootstrap-touchspin.min.js'
				]
			],
			'mixitup' => [

				'js' => [
					'jquery.mixitup.js',
				]
			],
			'wow' => [

				'js' => [
					'wow.min.js',
				]
			],
			'placeholdem' => [

				'js' => [
					'placeholdem.min.js',
				]
			],
			'vide' => [

				'js' => [
					'jquery.vide.js',
				]
			],
			'prettyPhoto' => [
				'css' => [
					'prettyPhoto/css/prettyPhoto.css'
				],
				'js' => [
					'prettyPhoto/js/jquery.prettyPhoto.js',
				]
			],
			'smooth-scroll' => [

				'js' => [
					'smooth-scroll.js',
				]
			],
			'waypoints' => [

				'js' => [
					'waypoints.min.js',
				]
			],
			'counterup' => [

				'js' => [
					'jquery.counterup.min.js',
				]
			],
			'scroll-top' => [

				'js' => [
					'scroll-top.js',
				]
			],
			'lazyload' => [

				'js' => [
					'jquery.lazyload.js',
				]
			],
			'appear' => [

				'js' => [
					'jquery.appear.js',
				]
			],
			'slicknav' => [

				'js' => [
					'jquery.slicknav.js',
				]
			],
			'owl-carousel'=>[
				'css' => [
					'owl-carousel/css/owl.carousel.css',
					'owl-carousel/css/owl.theme.default.min.css',

				],
				'js' => [
					'owl-carousel/js/owl.carousel.js',
				]
			],
			'modernizr' =>[
				'js' => [
					'modernizr/js/modernizr.2.5.3.min.js',
				]
			],
			'scrollTo' => [

				'js' => [
					'scrollTo/jquery.scrollTo.js',
				]
			],
			'bootstrap-select' => [
				'css' => [
					'bootstrap-select/css/bootstrap-select.min.css'
				],
				'js' => [
					'bootstrap-select/js/bootstrap-select.min.js'
				]
			],
			'magnific-popup' => [

				'js' => [
					'magnific-popup/jquery.magnific-popup.min.js',
				],
				'css' => [
					'magnific-popup/magnific-popup.css',
				],
			],
			'youtube-popup' => [
				'js' => [
					'youtube-popup/YouTubePopUp.jquery.js',

				],
				'css' => [
					'youtube-popup/YouTubePopUp.css',

				]
			],
			'fastclick' => [
				'js' => [
					'fastclick/lib/fastclick.js'
				]
			],
			'chartjs' => [
				'js' => [
					'chart.js/dist/Chart.min.js'
				]
			],
			'gauge' => [
				'js' => [
					'gauge.js/dist/gauge.min.js'
				]
			],
			'nprogress'=> [
				'js' => [
					'nprogress/nprogress.js'
				],
				'css' => [
					'nprogress/nprogress.css',
				]

			],
			'icheck'=> [
				'js' => [
					'icheck/icheck.min.js'
				],
				'css' => [
					'icheck/skins/flat/blue.css',
				]

			],
			'skyicons' => [
				'js' => [
					'skycons/skycons.js',
				]
			],
			'flot' => [
				'js' => [
					'flot/jquery.flot.js',
					'flot/jquery.flot.pie.js',
					'flot/jquery.flot.time.js',
					'flot/jquery.flot.stack.js',
					'flot/jquery.flot.resize.js',
					'flot.orderbars/js/jquery.flot.orderBars.js',
					'flot-spline/js/jquery.flot.spline.min.js',
					'flot.curvedlines/curvedLines.js',
				]
			],
			'bootstrap-progressbar' => [
				'css' => [
					'bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'
				],
				'js' => [
					'bootstrap-progressbar/bootstrap-progressbar.min.js'
				]
			],
			'jqvmap' => [
				'css' => [
					'jqvmap/dist/jqvmap.min.css'
				],
				'js' => [

				]
			],
			'moment'=> [
				'js' => [
					'moment/min/moment.min.js',
				]
			],
			'bootstrap-daterangepicker' => [
				'css' => [
					'bootstrap-daterangepicker/daterangepicker.css'
				],
				'js' => [
					'bootstrap-daterangepicker/daterangepicker.js'
				]
			],
			'bootstrap-datetimepicker' => [
				'css' => [
					'bootstrap-datetimepicker/css/bootstrap-datetimepicker.css'
				],
				'js' => [
					'bootstrap-datetimepicker/js/bootstrap-datetimepicker.js'
				]
			],
			'gentella-dashboard' => [
				'css' => [
					'gentella-dashboard/css/custom.css'
				],
				'js' => [
					'gentella-dashboard/js/custom.min.js'

				]
			],
			'full-slider' =>[
				'css' => [
					'full-slider/full-slider.css'
				],
			]



		]
	]
];











