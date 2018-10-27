<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class proveedores extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_prov';  
   protected $fillable=['id_prov','nomb_prov','razon_social','sector_comercial','colonia'
   ,'calle','numero_ext','telefono','email','id_est','id_municipio','archivo','activo'];
   
   protected $date=['delete_at'];
}
