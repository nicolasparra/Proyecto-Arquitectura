<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
header('Access-Control-Allow-Origin: *');
class estacion_parametro extends Model
{
    protected $table='estacion_parametro';

    public function contaminacion(){
    	//modelo al que va digirigiod, clave foranea, clave local a relacionar
        return $this->hasMany('App\medicion_contaminacion','estacion_parametro_id','id');
    }

    public function meteorologico(){
        return $this->hasMany('App\medicion_meteorologico','estacion_parametro_id','id');
    }
}
