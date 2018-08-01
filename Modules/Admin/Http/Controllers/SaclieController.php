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
use Modules\Admin\Http\Requests\SaclieRequest;

//Modelos
use Modules\Admin\Model\Saclie;

class SaclieController extends Controller
{
    protected $titulo = 'Saclie';

    public $js = [
        'Saclie'
    ];
    
    public $css = [
        'Saclie'
    ];

    public $librerias = [
        'datatables'
    ];

    public function index()
    {
        $paises =  DB::table('SAPAIS')->select('Pais', 'Descrip')->get();
        return $this->view('admin::Saclie', [
            'Saclie' => new Saclie(),
            'paises' => $paises
        ]);
    }

    public function nuevo()
    {
        $Saclie = new Saclie();
        return $this->view('admin::Saclie', [
            'layouts' => 'admin::layouts.popup',
            'Saclie' => $Saclie
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Saclie = Saclie::find($id);
        return $this->view('admin::Saclie', [
            'layouts' => 'admin::layouts.popup',
            'Saclie' => $Saclie
        ]);
    }

    public function buscar(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')) {
            $Saclie = DB::table('saclie as a')
                   ->select('a.CodClie as id', 'a.*', 'b.Descrip as Estado', 'c.Descrip as Ciud', 'd.usuario_id')
                    ->leftJoin('SAESTADO as b', 'b.Estado', '=', 'a.Estado')
                    ->leftJoin('SACIUDAD as c', 'c.Ciudad', '=', 'a.Ciudad')
                    ->leftJoin('APP_CLIENTES_USUARIOS as d', 'd.CodClie', '=', 'a.CodClie')
                    ->where('a.CodClie', $id)
                    ->first();
        } else {
            $Saclie = DB::table('saclie as a')
                    ->select('a.CodClie as id', 'a.*', 'b.Descrip as Estado', 'c.Descrip as Ciud', 'd.usuario_id')
                    ->leftJoin('SAESTADO as b', 'b.Estado', '=', 'a.Estado')
                    ->leftJoin('SACIUDAD as c', 'c.Ciudad', '=', 'a.Ciudad')
                    ->leftJoin('APP_CLIENTES_USUARIOS as d', 'd.CodClie', '=', 'a.CodClie')
                    ->where('a.CodClie', $id)
                    ->first();
        }

         if ($Saclie) {
           $Saclie = (Array) $Saclie;
           return array_merge($Saclie, [
               's' => 's',
               'msj' => trans('controller.buscar')
           ]);
        }

        return trans('controller.nobuscar');
    }

    public function guardar(SaclieRequest $request, $id = 0)
    {
        DB::beginTransaction();
        try{
            $Saclie = $id == 0 ? new Saclie() : Saclie::find($id);

            $Saclie->fill($request->all());
            $Saclie->save();
        } catch(QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch(Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }
        DB::commit();
       
        return [
            'id'    => $Saclie->id,
            'texto' => $Saclie->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }
    public function activar_usuario($CodClie = ""){
        DB::beginTransaction();
        try{
                $eliminar = DB::table('APP_CLIENTES_USUARIOS')->where('CodClie', '=', $CodClie)->delete();
                if($consulta_cliente){
                    $claveTemporal = $this->GenerarClave();
                    $id_usuario_activo = DB::table('APP_USUARIO')
                                            ->insertGetId(
                                                [   'usuario' =>  $CodClie,
                                                    'password' => bcrypt($claveTemporal),
                                                    'perfil_id' => 3,
                                                    'dni' => 12345678,
                                                    'autenticacion' => 'B',
                                                    'super' => 'n',
                                                    'created_at'=> Carbon::now(), 
                                                    'updated_at'=> Carbon::now(), 
                                                ]
                                        );
                    if($id_usuario_activo > 0){
                         $ok = DB::table('APP_CLIENTES_USUARIOS')
                                            ->insert([
                                                [   'CodClie' =>  $CodClie,
                                                    'usuario_id' => $id_usuario_activo
                                                ]
                                ]);
                    }
                }
        } catch(QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch(Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }
        DB::commit();
        $usuario = DB::table('saclie as a')
                    ->where('a.CodClie', $CodClie)
                    ->first();
        if($usuario->Email)            
            $this->EnviarEmail($usuario, $claveTemporal);
        
        return [
                    's'     => 's',
                    'msj'   => 'Usuario Web Activado'
        ];
        
    }
    public function eliminar(Request $request, $id = 0)
    {
        try{
            Saclie::destroy($id);
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
            Saclie::withTrashed()->find($id)->restore();
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
            Saclie::withTrashed()->find($id)->forceDelete();
        } catch (QueryException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->errorInfo[2];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function datatable(Request $request)
    {
        $sql = DB::table('saclie as a')
                    ->select('a.CodClie as id', 'a.Descrip', 'a.Activo', 'a.Direc1', 'b.Descrip as Estado', 'c.Descrip as Ciud')
                    ->leftJoin('SAESTADO as b', 'b.Estado', '=', 'a.Estado')
                    ->leftJoin('SACIUDAD as c', 'c.Ciudad', '=', 'a.Ciudad')
                    ->get();

        
        return Datatables::of($sql)
            ->setRowId('id')
            ->editColumn('Activo', '
                @if($Activo == 1)
                    <span class="label label-info">Activo</span>
                @else
                    <span class="label label-default">Inactivo</span>
                @endif

            ')
            ->setRowClass(function ($registro) {
                return is_null($registro->Descrip) ? '' : '.bg-silver bg-font-black-thunderbird';
            })
            ->make(true);
    }
    public function datatable2(Request $request)
    {
        $sql = DB::table('saclie as a')
                    ->select('a.CodClie as id', 'a.Descrip', 'a.Activo', 'a.Direc1', 'b.Descrip as Estado', 'c.Descrip as Ciud')
                    ->leftJoin('SAESTADO as b', 'b.Estado', '=', 'a.Estado')
                    ->leftJoin('SACIUDAD as c', 'c.Ciudad', '=', 'a.Ciudad')
                    ->where('a.Activo', 0)
                    ->get();

        
        return Datatables::of($sql)
            ->setRowId('id')
            ->editColumn('Activo', '
                @if($Activo == 1)
                    <span class="label label-info">Activo</span>
                @else
                    <span class="label label-default">Inactivo</span>
                @endif

            ')
            ->setRowClass(function ($registro) {
                return is_null($registro->Descrip) ? '' : '.bg-silver bg-font-black-thunderbird';
            })
            ->make(true);
    }
    public function estados($Pais = 0){
        $estados =  DB::table('SAESTADO')
                    ->select('Estado', 'Descrip')
                    ->where('Pais', $Pais)
                    ->get('Estado', 'Descrip');
        $option = "<option selected value=''>Seleccione...</option>";
        foreach($estados as $estado){
            $option .= '<option value="'.  $estado->Estado .'">' . $estado->Descrip . '</option>';
        }
        return [
                    's' => 's',
                    'estados' => $option
                ];
    }
    public function ciudad($Pais = 0, $Estado = 0){
        $ciudad =  DB::table('SACIUDAD')
                    ->select('Ciudad', 'Descrip')
                    ->where('Pais', $Pais)
                    ->where('Estado', $Estado)
                    ->get('Ciudad', 'Descrip');
        $option = "<option selected value=''>Seleccione...</option>";
        foreach($ciudad as $ciudad){
            $option .= '<option value="'.  $ciudad->Ciudad .'">' . $ciudad->Descrip . '</option>';
        }
        return [
                    's' => 's',
                    'ciudad' => $option
                ];
    }
    public function municipio($Pais = 0, $Estado = 0, $Ciudad = 0){
        $municipio =  DB::table('SAMUNICIPIO')
                    ->select('Municipio', 'Descrip')
                    ->where('Pais', $Pais)
                    ->where('Estado', $Estado)
                    ->where('Ciudad',$Ciudad)
                    ->get('Ciudad', 'Descrip');
        $option = "<option selected value=''>Seleccione...</option>";
        foreach($municipio as $municipio){
            $option .= '<option value="'.  $municipio->Municipio .'">' . $municipio->Descrip . '</option>';
        }
        return [
                    's' => 's',
                    'municipio' => $option
                ];
    }
    function GenerarClave(){
        $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $longpalabra=8;
        for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
          $x = rand(0,$n);
          $pass.= $caracteres[$x];
        }
        return $pass;
    }
    public function EnviarEmail($usuario, $claveTemporal){
        $title = "Confirmacion de afiliacion a la aplicación de DRODOCA";
        $message = "";
        $destinatario = $usuario->Email;
        $data = [
                    'title' => $title, 
                    'message' => $message, 
                    'claveTemporal' => $claveTemporal, 
                    'usuario' => $usuario->usuario, 
                    'destinatario' => $destinatario 
                ];
        
        $enviado = Mail::send('admin::MensajeAfiliacion', $data, function ($message) use ($destinatario){
                        $message->from('lealcristian46@gmail.com', 'Scotch.IO');
                        $message->to($destinatario);
                        $message->subject('Administrador Drodoca: Contraseña Temporal ');
                    });
        
        return $enviado;
    }
}