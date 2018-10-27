<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class categorias extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_categoria';  
   protected $fillable=['id_categoria','nomb_categoria','id_prod'];
   
   protected $date=['delete_at'];
}
