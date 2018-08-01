<?php 

namespace Modules\Admin\Model;
use Modules\Admin\Model\Modelo;

class vct extends Modelo{
	protected $table = 'vct';

	protected $fillable = ['codigo', 'nombre', 'ingreso', 'cargo', 'cedula'];

	public $timestamp = ['created_at'];
	public $deleted_at = false;
}
