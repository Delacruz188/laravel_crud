<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Servicio;
use App\Model\Tiposervicio;


class ServicioController extends Controller {

    public function listado() {

        $registros = DB::table('servicio')
        // ->join('personal','servicio.idpersonal','=','personal.id_personal')
        ->join('tiposervicio','tiposervicio.idtiposervicio','=','servicio.idtiposervicio')
        ->join('personal','personal.id_personal','=','servicio.idpersonal')
        ->join('socio','socio.id_socio','=','servicio.idsocio')
        ->select('servicio.id_servicio', 'tiposervicio.nombre', 'personal.nombre_personal', 'socio.nombre_socio')
        ->whereRaw("servicio.idtiposervicio=tiposervicio.idtiposervicio")
        
        // where 
        ->get();


        // un metodo parte de este controlador que sirva para pedir los datos de la base de datos del modelo
        // $servicioContenido = Servicio::all();
        // $tiposervicioDatos = Tiposervicio::all();
        // vamos a hacer que la vista tenga los datos para que puedan ser mostrados
        // creamos primero un arreglo donde van a estar los datos pasados (hay varias formas)
        $datos = array();
        // vamos a hacerlo un diccionario
        $datos['lista'] = $registros;
        // $datos['lista']['tiposervicio'] = $tiposervicioDatos;
        // ahora vamos a hacer que ese arreglo, tenga el nombre para que se muestre en la vista
        // dd($datos);
        // ahora le decimos que nos devuelva una vista
        return view('Servicio.listado')->with($datos);
    }


    // creamos otro metodo que nos permita mostar un formulario
    public function formulario(Request $r){
        // recibir datos que envia el usuario
        $datos=$r->all();
        if ($r->isMethod('post')) {
            // si la peticion es post entonces voy a agregar
            $operacion = 'Agregar';
            $servicio = new Servicio();
        } elseif($r->isMethod('get')){
            // si es get, entonces voy a eliminar o modificar
            $operacion = 'Editar';
            $servicio = Servicio::find($datos['id_servicio']);
        }
        // ahora vamos a devolver los datos para que la view sepa que va a realizar
        $informacion=array();
        $informacion['operacion']=$operacion;
        $informacion['servicio']=$servicio;
        return view('Servicio.formulario')->with($informacion);
    }

    
    // creamos otro metodo, pero ahora va a ser para insertar datos
    public function save(Request $r){
        // manejar la peticion
        $datos = $r->all();
        
        switch ($datos['operacion']) {
            case 'Agregar':
                // vamos a guardar los datos en la base de datos
                // primero creamos un objeto con la instancia de servicio para tener todos sus atributos
                $servicio = new Servicio();
                // $servicio->id_servicio=$datos['id_servicio'];
                $servicio->nombre_servicio=$datos['nombre_servicio'];
                $servicio->save();
                break;
            
            case 'Editar':
                $servicio = Servicio::find($datos['id_servicio']);
                $servicio->nombre_servicio=$datos['nombre_servicio'];
                $servicio->save();
                break;

            case 'Eliminar':
                $servicio = Servicio::find($datos['id_servicio']);
                $servicio->delete();
                break;
        }
        
        // retornar el listado hasta que los metodos de eliminar, editar e insertar hayan sido completamentados
        return $this->listado();
    }

    

}