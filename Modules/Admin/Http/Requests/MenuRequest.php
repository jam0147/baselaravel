<?php

namespace Modules\Admin\Http\Requests;

use App\Http\Requests\Request;

class MenuRequest extends Request {
	protected $reglasArr = [
		'data.*.nombre' => ['required', 'min:3', 'max:50', 'regex:/^[a-z\s\d_\-ñáéíóú]*$/i'],
		'data.*.direccion' => ['required', 'min:1', 'max:50', 'regex:/^[a-z_\-\/\#]*$/i'],
		'data.*.icono' => ['max:50'],

		'data.*.padre' => ['required'],
		'data.*.posicion' => ['required', 'integer'],
	];

	public function rules() {
		return $this->reglas();
	}
}