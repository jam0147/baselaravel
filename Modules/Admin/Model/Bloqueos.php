<?php
namespace Modules\Admin\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bloqueos extends Model
{
	protected $table = 'bloqueos';
    protected $fillable = ["parametro","activo","fecha_desde", "fecha_hasta", "tipoNomina"];
    public $timestamps = false;

    protected $hidden = ['deleted_at'];

     public function setFechaDesdeAttribute($value){
		if (strlen($value)) {
            	$this->attributes['fecha_desde'] = Carbon::createFromFormat('d/m/Y', $value);
		    } else {
		        $this->attributes['fecha_desde'] = null;
		    }
	}

	public function getFechaDesdeAttribute($value){
		if (strlen($value)) {
				return Carbon::parse($value)->format('d/m/Y');	
		    } else {
				return null;	
		    }
	}
	public function setFechaHastaAttribute($value){
		if (strlen($value)) {
            	$this->attributes['fecha_hasta'] = Carbon::createFromFormat('d/m/Y', $value);
		    } else {
		        $this->attributes['fecha_hasta'] = null;
		    }
	}

	public function getFechaHastaAttribute($value){
		if (strlen($value)) {
				return Carbon::parse($value)->format('d/m/Y');	
		    } else {
				return null;	
		    }
	}
}