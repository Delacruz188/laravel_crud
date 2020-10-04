<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// el modelo representa la tabla que vamos a utilizar de la base de datos

class Servicio extends Model {
  protected $table = "servicio";
  protected $primaryKey = 'id_servicio';
  public $timestamps = false;
}