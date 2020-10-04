<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Personal;
use App\Model\Servicio;
use App\Model\Sucursal;
use App\Model\Tiposervicio;
use App\Model\Socio;
use App\Model\Tiposocio;


// vamos a importar la libreria faker
use Faker\Factory as Faker;

class DbUpController extends Controller
{
    // public function personal(){
    //     //instanciamos el objeto Faker para poder utilizar sus metodos en nuestro Controlador
    //     $faker = Faker::create();
    //     $sucursales = Sucursal::all();
    //     for ($i=1; $i < 51; $i++) { 
    //         $personal = new Personal();
    //         // necesitamos el nombre
    //         $personal->nombre_personal=$faker->name.' '.$faker->lastname;
    //         // el curp
    //         // utilizamos regex
    //         $personal->curp=$faker->regexify('([A-Z0-9]){10}');
    //         // foto
    //         $personal->foto=' ';
    //         // idsucursal
    //         $personal->idsucursal = $sucursales->random()->idsucursal;
    //         $personal->save();
    //     }
    // }


    // ahora vamos a generar servicios a lo desgraciado
    public function servicio() {
        // instanciar faker
        $faker = Faker::create();
        $tiposervicio = Tiposervicio::all();
        $personales = Personal::all();
        $socios=Socio::all();
        for ($i=1; $i < 51 ; $i++) { 
            $servicio = new Servicio();
            // $servicio->nombre_servicio = $tiposervicio->random()->nombre;
            $servicio->idtiposervicio = $tiposervicio->random()->idtiposervicio;
            $servicio->idpersonal=$personales->random()->id_personal;
            $servicio->idsocio=$socios->random()->id_socio;
            $servicio->save();
        }
    }

    public function socios() {
        // instanciar faker
        $faker = Faker::create();
        // $tiposervicio = Tiposervicio::all();
        // $personales = Personal::all();
        $socios=Socio::all();
        $tiposocio=Tiposocio::all();
        for ($i=1; $i < 11 ; $i++) { 
            $socio = new Socio();
            // $servicio->nombre_servicio = $tiposervicio->random()->nombre;
            // $servicio->idtiposervicio = $tiposervicio->random()->idtiposervicio;
            // $servicio->idpersonal=$personales->random()->id_personal;
            // $socio->idsocio=$socios->random()->id_socio;
            $socio->nombre_socio = $faker->name.' '.$faker->lastname;
            $socio->id_tiposocio = $tiposocio->random()->id_tiposocio;
            $socio->save();
        }
    }
}
