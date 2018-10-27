<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class clientes extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_cliente';  
   protected $fillable=['id_cliente','nomb_cliente','colonia','calle','numero_ext','telefono','email',
   'id_est','id_municipio','archivo','activo'];
   
   protected $date=['delete_at'];
}
