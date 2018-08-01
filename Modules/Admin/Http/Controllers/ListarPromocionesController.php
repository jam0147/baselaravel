<?php

namespace Modules\Admin\Http\Controllers;

//Controlador Padre
use Modules\Admin\Http\Controllers\Controller;

//Dependencias
use DB;
use Carbon\Carbon; 
use App\Http\Requests\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;

//Request
//use Modules\Admin\Http\Requests\PromocionesRequest;

//Modelos
use Modules\Admin\Model\Promociones;

class ListarPromocionesController extends Controller
{
    protected $titulo = 'Mostrar Promociones';

    public $js = [
        'listarpromociones'
    ];
    
    public $css = [
        'listarpromociones'
    ];

    public $librerias = [
        'datatables'
    ];

    public function index()
    {
        return $this->view('admin::listarpromociones');
    }

    public function nuevo()
    {
        $Promociones = new Promociones();
        return $this->view('admin::ListarPromociones', [
            'layouts' => 'admin::layouts.popup',
            'Promociones' => $Promociones
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Promociones = Promociones::find($id);
        return $this->view('admin::ListarPromociones', [
            'layouts' => 'admin::layouts.popup',
            'Promociones' => $Promociones
        ]);
    }

    public function buscar(Request $request, $id = 0)
    {   
       if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')){
            $Promociones = Promociones::withTrashed()->find($id);
        }else{
            $Promociones = Promociones::find($id);
        }

         if ($Promociones) {
            $descripcion_almacen = DB::table('SADEPO')
                                    ->select('Descrip')
                                    ->where('CodUbic', $Promociones->codalmacen)
                                    ->first();

           return redirect()->action('\Http\PromocionesController@buscar', [1]);
           //return redirect()->action('\Http\PromocionesController@buscar', ['id' => $id]);
        }

        return trans('controller.nobuscar');
    }
    
    public function datatable(Request $request)
    {
        $sql = Promociones::select('id', 'descripcion', 'fechadesde', 'fechahasta', 'porcentaje', 'codalmacen', 'diascredito', 'deleted_at');
       return Datatables::of($sql)
            ->setRowId('id')
            ->setRowClass(function ($registro) {
                return is_null($registro->descripcion) ? '' : '.bg-silver bg-font-black-thunderbird';
            })
            ->make(true);
    }
    
    
}