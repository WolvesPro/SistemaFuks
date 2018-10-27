<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class alertas extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_alerta';  
   protected $fillable=['id_alerta','nombre_alerta','tipo','activo'];
   
   protected $date=['delete_at'];
}
