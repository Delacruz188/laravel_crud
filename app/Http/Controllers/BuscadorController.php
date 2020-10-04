<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BuscadorController extends Controller{
    function index(Request $r){
        $context = $r->all();
        if ($r->isMethod('post')) {
            $registros = DB::table('socio', 'tiposocio')
            // ->join('personal','servicio.idpersonal','=','personal.id_personal')
            ->join('tiposocio','socio.id_tiposocio','=','tiposocio.id_tiposocio')
            ->select('socio.nombre_socio','socio.id_socio', 'tiposocio.nombre_tiposocio')
            ->whereRaw("socio.nombre_socio like '%".$context['criterio']."%'or tiposocio.nombre_tiposocio like'%".$context['criterio']."%'")
            ->get();
            $datos = array();
            $datos['registros']=$registros;
            $datos['criterio']=$context['criterio'];
        } else {
            $datos=array();
            $datos['registros']=array();
            $datos['criterio']='';
        }
        return view('buscador.index')->with($datos);
    }
}
