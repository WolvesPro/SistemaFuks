<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipios extends Model
{
   protected $primaryKey = 'id_municipio';  
   protected $fillable=['id_municipio','nomb_municipio','id_est','activo'];
}
