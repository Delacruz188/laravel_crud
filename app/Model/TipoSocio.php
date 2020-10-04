<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Tiposocio extends Model {
  protected $table = "tiposocio";
  protected $primaryKey = 'id_tiposocio';
  public $timestamps = false;
}