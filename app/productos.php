<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class productos extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_prod';  
   protected $fillable=['id_prod','nomb_prod','precio','existencia','descripcion','id_prov','id_cliente',
   'activo'];
   
   protected $date=['delete_at'];
}
