<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicion_meteorologico extends Model
{
   protected $table='medicion_meteorologico';
    public function estacion()
    {
    	return $this->belongsTo('App\estacion_parametro','estacion_parametro_id','id');
    }
}
