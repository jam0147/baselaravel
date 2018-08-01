<?php
namespace Modules\Admin\Model;

use Illuminate\Database\Eloquent\Model;

class AppPais extends Model
{
	protected $table = 'app_pais';
    protected $fillable = ["nombre","lenguaje"];

    protected $hidden = [];
}