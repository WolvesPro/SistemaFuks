<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class areas extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_area';  
   protected $fillable=['id_area','nomb_area','ubicacion','id_ma','activo'];
   
   protected $date=['delete_at'];
}
