<?php 

namespace Modules\Admin\Model;

use Modules\Admin\Model\Modelo;
use Illuminate\Database\Eloquent\Model;

class Articulos extends Modelo {
	
	protected $table = 'SAPROD';
	protected $fillable = [
		'CodProd', 
		'Descrip',
		'CodInst', 
		'Activo', 
		'Descrip2',
		'Descrip3', 
		'Refere', 
		'Marca',
		'Unidad', 
		'UndEmpaq', 
		'CantEmpaq',
		'Precio1',
		'Precio2',
		'PrecioU2',
		'Precio3',
		'PrecioU3',
		'PrecioU'
	];

	protected $hidden = [];

	public $permisos = [];

	
	
}
