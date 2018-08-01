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

class PromocionesController extends Controller
{
    protected $titulo = 'Promociones';

    public $js = [
        'promociones'
    ];
    
    public $css = [
        'promociones'
    ];

    public $librerias = [
        'datatables',
        'jquery-ui',
        'jquery-ui-timepicker',
    ];

    public function index()
    {
        return $this->view('admin::promociones');
    }

    public function nuevo()
    {
        $Promociones = new Promociones();
        return $this->view('admin::Promociones', [
            'layouts' => 'admin::layouts.popup',
            'Promociones' => $Promociones
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Promociones = Promociones::find($id);
        return $this->view('admin::Promociones', [
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

           return array_merge($Promociones->toArray(), [
                'promociones' => $Promociones,
                'descripalmacen' =>$descripcion_almacen, 
                's' => 's',
                'msj' => trans('controller.buscar'),
            ]);
        }

        return trans('controller.nobuscar');
    }
    public function buscarpromo(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')){
            $Promociones = Promociones::withTrashed()->find($request->id);
        }else{
            $Promociones = Promociones::find($request->id);
        }

         if ($Promociones) {
            $descripcion_almacen = DB::table('SADEPO')
                                    ->select('Descrip')
                                    ->where('CodUbic', $Promociones->codalmacen)
                                    ->first();
            $data =  array_merge($Promociones->toArray(), [
                'promociones' => $Promociones,
                'descripalmacen' =>$descripcion_almacen, 
                's' => 's',
                'msj' => trans('controller.buscar'),
            ]);
            return $this->view('admin::promociones', ['data' => $data]);
            
        }

        return trans('controller.nobuscar');
    }
    public function  buscar_almacen($id = 0){
        $almacen = DB::table('SADEPO')
                    ->select('CodUbic as id', 'Descrip')
                   ->first();
        return [
                'almacen' => $almacen
                ];
    }    
    public function guardar(Request $request, $id = 0)
    {
        DB::beginTransaction();
        try{
            $Promociones = $id == 0 ? new Promociones() : Promociones::find($id);

            $Promociones->fill($request->all());
            $Promociones->save();
        } catch(QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch(Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }
        DB::commit();
       
        return [
            'id'    => $Promociones->id,
            'texto' => $Promociones->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }
    
    public function eliminar(Request $request, $id = 0)
    {
        try{
            Promociones::destroy($id);
        } catch (QueryException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->errorInfo[2];
        }

        return ['s' => 's', 'msj' => trans('controller.eliminar')];
    }

    public function restaurar(Request $request, $id = 0)
    {
        try {
            Promociones::withTrashed()->find($id)->restore();
        } catch (QueryException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->errorInfo[2];
        }

        return ['s' => 's', 'msj' => trans('controller.restaurar')];
    }

    public function destruir(Request $request, $id = 0)
    {
        try {
            Promociones::withTrashed()->find($id)->forceDelete();
        } catch (QueryException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->errorInfo[2];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
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
    public function datatable2(Request $request)
    {
        $sql = DB::table('SADEPO')
                    ->select('CodUbic as id', 'Descrip')
                   ->get();

        
        return Datatables::of($sql)
            ->setRowId('id')
            ->setRowClass(function ($registro) {
                return is_null($registro->Descrip) ? '' : '.bg-silver bg-font-black-thunderbird';
            })
            ->make(true);
    }
    
}