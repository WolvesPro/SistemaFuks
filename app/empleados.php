<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class empleados extends Model
{
   use SoftDeletes;
   protected $primaryKey = 'id_emp';  
   protected $fillable=['id_emp','nomb_emp','ape_paterno','ape_materno','colonia','calle','numero_ext',
   'email','puesto','id_est','id_municipio','id_area'];
   
   protected $date=['delete_at'];
}
