<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// el modelo representa la tabla que vamos a utilizar de la base de datos

class Personal extends Model {
  protected $table = "personal";
  protected $primaryKey = 'id_personal';
  public $timestamps = false;
}