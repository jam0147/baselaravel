<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
 
class BloqueosRequest extends Request {
	protected $reglasArr = [
		'parametro' => ['required'], 
		'activo' => [''], 
		'fecha' => ['']
	];
}