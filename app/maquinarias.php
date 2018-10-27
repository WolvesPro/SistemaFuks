<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class maquinarias extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_ma';  
   protected $fillable=['id_ma','nombre_ma','unidades','descripcion','id_alerta','activo'];
   
   protected $date=['delete_at'];
}
