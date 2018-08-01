<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;
 
class AppPaisRequest extends Request {
	protected $reglasArr = [
		'nombre' => ['required', 'min:3', 'max:50'], 
		'lenguaje' => ['required', 'min:3', 'max:5']
	];
}