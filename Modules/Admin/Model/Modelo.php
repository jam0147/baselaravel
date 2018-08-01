<?php

namespace Modules\Admin\Model;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Admin\Model\Historico;

class Modelo extends Model
{
	use SoftDeletes;
	protected $fillable = [];

	protected $hidden = ['created_at', 'updated_at'];
	protected $historico = true;
	public static $_historico = true;
	//protected $dateFormat = 'd/m/Y H:i:s';
	
	public $timestamps = false;

	protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

	public static function boot(){
		parent::boot();

		//--- Modificando los campos de fecha y hora
		// Creando
		static::creating(function($model) {
			$model->created_at = Carbon::now();
			$model->updated_at = Carbon::now();
			return true;
		});

		// Actualizando
		static::updating(function($model) {
			$model->updated_at = Carbon::now();
			return true;
		});

		//--- Creando un registro en el historico de la aplicacion
		// Creado
		static::created(function($model) {
			$model->historico('creado', $model->id);
			return true;
		});

		// Actualizado
		static::updated(function($model) {
			$model->historico('actualizado', $model->id);
			return true;
		});

		// Eliminado
		static::deleted(function($model) {
			$model->historico('eliminado', $model->id);
			return true;
		});
	}

	public function historico($concepto, $id){
		if (!$this->historico || !self::$_historico){
			return;
		}

		$usuario = auth()->user();
		
		$login = is_null($usuario) ? 'Invitado' : $usuario->usuario;
		
		Historico::create([
			'tabla' 		=> $this->table,
			'concepto' 		=> $concepto,
			'idregistro' 	=> $id,
			'usuario' 		=> $login,
		]);
	}

	 public function formatoFecha($value){
        if ($value == ''){
            return null;
        }

        $formato = preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $value) ? 'Y-m-d' : 'd/m/Y';
        return Carbon::createFromFormat($formato, $value);
    }
}