<?php namespace Modules\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Modules\Admin\Model\Perfil;

class perfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfiles = [
            'Desarrollador',
            'Administrador',
            'Supervisor',
            'Asesor Ventas',
            'Usuario Regular',
            
        ];
        
        foreach ($perfiles as $perfil) {
            Perfil::create([
                'nombre' => $perfil
                ]);
            }
        /*
        $permisos = [
            [5, "venta"],
            [5, "ordenes"],
            [5, "venta/guardar"],
            [5, "venta/precio-onix"],
            [5, "ordenes/datatable"],
            [5, "buscar"],
            [5, "eliminar"],
            [5, "ordenes/buscar"],
            [5, "ordenes/eliminar"],
            [5, "ordenes/guardar"],
            [5, "perfil"]
        ];
        foreach ($permisos as $value) {
            \DB::table('app_perfiles_permisos')->insert(['perfil_id'=>$value[0], 'ruta'=>$value[1]]);
        }

        $perfiles = [
            'Embajador'

        ];

        foreach ($perfiles as $perfil) {
            Perfil::create([
                'nombre' => $perfil
            ]);
        }
        $permisos = [
            [6, "venta"],
            [6, "ordenes"],
            [6, "venta/guardar"],
            [6, "venta/precio-onix"],
            [6, "venta/precio-onix-cripto"],
            [6, "ordenes/datatable"],
            [6, "buscar"],
            [6, "eliminar"],
            [6, "ordenes/buscar"],
            [6, "ordenes/eliminar"],
            [6, "ordenes/guardar"],
            [6, "perfil"]
        ];
        
        foreach ($permisos as $value) {
            \DB::table('app_perfiles_permisos')->insert(['perfil_id'=>$value[0], 'ruta'=>$value[1]]);
        }*/
    
    }
}
