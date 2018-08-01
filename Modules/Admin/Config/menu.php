<?php

$menu['admin'] = [
	[
		'nombre' 	=> 'Home',
		'direccion' => 'Escritorio',
		'icono' 	=> 'fa fa-home',
	],
	[
		
		'nombre' 	=> 'Admin',
		'direccion' => '#Administrador',
		'icono' 	=> 'fa fa-gear',
		'menu' 		=> [
			[
				'nombre' 	=> 'Usuarios',
				'direccion' => 'usuarios',
				'icono' 	=> 'fa fa-user'
			],
			[
				'nombre' 	=> 'Perfiles',
				'direccion' => 'perfiles',
				'icono' 	=> 'fa fa-users'
			]
			
		],
		
	],
];