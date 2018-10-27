<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class almacenes extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_almacen';  
   protected $fillable=['id_almacen','nomb_almacen','id_prod','id_area'];
   
   protected $date=['delete_at'];
}
