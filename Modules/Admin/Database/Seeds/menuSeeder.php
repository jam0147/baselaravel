<?php namespace Modules\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Modules\Admin\Model\Menu;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
			'nombre'    => 'Administrador',
			'padre'     => 0,
			'posicion'  => 0,
			'direccion' => '#Administrador',
			'icono'     => 'fa fa-gear'
		]);

		Menu::create([
			'nombre'    => 'Usuarios',
			'padre'     => $menu->id,
			'posicion'  => 0,
			'direccion' => 'usuarios',
			'icono'     => 'fa fa-user'
		]);

		Menu::create([
			'nombre'    => 'Perfiles',
			'padre'     => $menu->id,
			'posicion'  => 1,
			'direccion' => 'perfiles',
			'icono'     => 'fa fa-users'
		]);

		Menu::create([
			'nombre'    => 'Menu',
			'padre'     => $menu->id,
			'posicion'  => 2,
			'direccion' => 'menu',
			'icono'     => 'fa fa-sitemap'
		]);
    }
}
