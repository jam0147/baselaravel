<?php namespace Modules\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Modules\Admin\Model\Usuario;
use Modules\Admin\Model\AppPais;

class usuariosSeeder extends Seeder
{
	
    public function run(){

		$pais = AppPais::create([
			"nombre" => 'Venezuela',
			"lenguaje" => 'es'
		]);

        $usuario = Usuario::create([
			'usuario' => 'admin',
			'nombre' => 'Administrador',
			'apellido'=> '',
			'password' => 'admin',
			'dni' => 12345678,
			'correo' => 'admin@gmail.com',
			'telefono' => '0414-123-1234',
			'autenticacion' => 'B',
			'perfil_id' => 1,
			'super' => 's',
			'sexo'=> 'm',
			'edo_civil'=> 's',
			'confirmacion'=>1,
			'app_pais_id'=> $pais->id,
			'terminos'=> true,
		]);
    }
}
