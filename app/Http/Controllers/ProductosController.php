<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Producto;

class ProductosController extends Controller {

    // creamos un metodo para que haga un listado de los productos
    public function listado(){
        // vamos a pedir la base de datos del modelo
        $producto_contenido = Producto::all();
        // ahora pasamos los datos a un arreglo para que puedan ser mostrados posteriormente
        $datos=array();
        // hacemos que seea un diccionario para manejarlo de manera mas comoda
        $datos['contenido']=$producto_contenido;
        // ahora nos va a devolver una vista con los datos que le pasamos
        return view('Producto.listado')->with($datos);
    }

    // vamos a hacer ahora un controlador para hacer mostrar un formulario
    public function formulario(Request $r){
        $datos=$r->all();
        if ($r->isMethod('post')) {
            // si la peticion es post entonces voy a agregar
            $operacion = 'Agregar';
            $producto = new Producto();
        } elseif($r->isMethod('get')){
            // si es get, entonces voy a eliminar o modificar
            $operacion = 'Editar';
            $producto = Producto::find($datos['id_producto']);
        }
        // ahora vamos a devolver los datos para que la view sepa que va a realizar
        $informacion=array();
        $informacion['operacion']=$operacion;
        $informacion['producto']=$producto;
        return view('Producto.formulario')->with($informacion);
    }

    // tenemos que crear un metodo que nos permita insertar datos en la base de datos

    public function save(Request $r){
        // manejar la peticion
        $datos = $r->all();
        
        switch ($datos['operacion']) {
            case 'Agregar':
                // vamos a guardar los datos en la base de datos
                // primero creamos un objeto con la instancia de servicio para tener todos sus atributos
                $producto = new Producto();
                // $producto->id_producto=$datos['id_producto'];
                $producto->nombre_producto=$datos['nombre_producto'];
                $producto->precio_producto=$datos['precio_producto'];
                $producto->save();
                break;
            
            case 'Editar':
                $producto = Producto::find($datos['id_producto']);
                $producto->nombre_producto=$datos['nombre_producto'];
                $producto->precio_producto=$datos['precio_producto'];
                $producto->save();
                break;

            case 'Eliminar':
                $producto = Producto::find($datos['id_producto']);
                $producto->delete();
                break;

        }
        
        // retornar el listado hasta que los metodos de eliminar, editar e insertar hayan sido completamentados
        return $this->listado();
    }

}