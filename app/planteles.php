<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class planteles extends Model
{
   protected $primaryKey = 'idp'; 
   protected $fillable=['idp','nombre'];
 
}
