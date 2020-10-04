<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// el modelo representa la tabla que vamos a utilizar de la base de datos

class Producto extends Model {
  protected $table = "producto";
  protected $primaryKey = 'id_producto';
  public $timestamps = false;
}