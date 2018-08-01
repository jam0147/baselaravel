<?php 

namespace Modules\Admin\Model;

use Modules\Admin\Model\Modelo;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Modelo {
	
	protected $table = 'PROMOCIONES';
	protected $fillable = [
		'descripcion', 
		'fechadesde',
		'fechahasta', 
		'porcentaje', 
		'diascredito',
		'codalmacen'
	];

	protected $hidden = ['created_at', 'updated_at'];

	public $permisos = [];

	
	
}
