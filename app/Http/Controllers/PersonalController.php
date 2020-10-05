<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Model\Personal;

class PersonalController extends Controller {

    public function listado() {

        $personal_contenido = DB::table('personal')
        // ->join('personal','servicio.idpersonal','=','personal.id_personal')
        ->join('sucursal','sucursal.idsucursal','=','personal.idsucursal')
        ->select('personal.id_personal','personal.nombre_personal', 'personal.curp', 'personal.foto', 'sucursal.nombre')
        ->whereRaw("personal.idsucursal=sucursal.idsucursal")
        
        // where 
        ->get();

        $datos = array();
        // vamos a hacerlo un diccionario
        $datos['contenido'] = $personal_contenido;
        // dd($datos); 
        // ahora le decimos que nos devuelva una vista
        return view('Personal.listado')->with($datos);
    }


    // creamos otro metodo que nos permita mostar un formulario
    public function formulario(Request $r){
        // recibir datos que envia el usuario
        $datos=$r->all();
        if ($r->isMethod('post')) {
            // si la peticion es post entonces voy a agregar
            $operacion = 'Agregar';
            $personal = new Personal();
        } elseif($r->isMethod('get')){
            // si es get, entonces voy a eliminar o modificar
            $operacion = 'Editar';
            $personal = Personal::find($datos['id_personal']);
        }
        // ahora vamos a devolver los datos para que la view sepa que va a realizar
        $informacion=array();
        $informacion['operacion']=$operacion;
        $informacion['personal']=$personal;
        return view('Personal.formulario')->with($informacion);
    }

    
    // creamos otro metodo, pero ahora va a ser para insertar datos
    public function save(Request $r){
        // manejar la peticion
        $datos = $r->all();
        
        switch ($datos['operacion']) {
            case 'Agregar':
                if($r->hasFile('foto')) {
                    // vamos a guardar en una variable la foto que viene de la peticion 
                    $archivo = $r->file('foto');
                    // time() nos genera un timestamp
                    // getClientOriginalExtension nos obtiene la extension del archivo
                    $nombre = 'foto-'.time().'.'.$archivo->getClientOriginalExtension();
                    $nombre_archivo = $archivo->storeAs('fotos', $nombre);
                }
                else{
                    // si el usuario no desea subir una foto en ese momento solamente debemos de guardar una variable de cadena vacia para que no haya un error en la base de datos
                    $nombre_archivo = '';
                }
                // vamos a guardar los datos en la base de datos
                // primero creamos un objeto con la instancia de servicio para tener todos sus atributos
                $personal = new Personal();
                // $personal->id_personal=$datos['id_personal'];
                $personal->nombre_personal=$datos['nombre_personal'];
                $personal->curp=$datos['curp'];
                $personal->foto=$nombre_archivo;
                $personal->idsucursal=$datos['sucursal'];
                $personal->save();
                break;
            
            case 'Editar':

                if ($r->hasFile('foto')) {
                    $archivo = $r->file('foto');
                    $nombre = 'foto-' . time() . '.' . $archivo->getClientOriginalExtension();
                    $nombre_archivo = $archivo->storeAs('fotos', $nombre);
                } else {
                    $nombre_archivo = '';
                }

                $personal = Personal::find($datos['id_personal']);
                $personal->nombre_personal=$datos['nombre_personal'];
                $personal->curp=$datos['curp'];
                $personal->idsucursal=$datos['sucursal'];
                if ($nombre_archivo != '') {
                    Storage::delete($personal->foto);
                    $personal->foto = $nombre_archivo;
                }
                $personal->save();
                break;

            case 'Eliminar':
                $personal = Personal::find($datos['id_personal']);
                $personal->delete();
                break;
        }
        
        // retornar el listado hasta que los metodos de eliminar, editar e insertar hayan sido completamentados
        return $this->listado();
    }


    public function mostrar_foto($nombre_foto) {
        $path = storage_path('app/fotos/'.$nombre_foto);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}