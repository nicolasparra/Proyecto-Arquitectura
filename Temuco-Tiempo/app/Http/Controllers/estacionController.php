<?php

namespace App\Http\Controllers;
header('Access-Control-Allow-Origin: *');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\estacion_parametro;
use App\medicion_meteorologico; 

class estacionController extends Controller
{
	//Devuele todas las estaciones 
    public function index(){       
        $estaciones=estacion_parametro::all();
        return response()->json(array(
            'Estaciones'=>$estaciones
        ),200);
    }

    //Devuelve luna estacion en especifico segun si id
    public function getEstacion($idEstacion){
    	$estacion = estacion_parametro::find($idEstacion)->load("meteorologico");
    	if($estacion!=null){
    		return response()->json(array('Estacion'=>$estacion,'status'=>'success'),200);
    	}else{
    		return response()->json(array('error'=>'No se encontró objeto con esa id','status'=>'error'),400);
    	}
    }

    //deuvle estaciones por el tipo
    public function getTipoEstacion(Request $request){
    	$tipo= $request->input('tipo',null);   	
    	$estacion = estacion_parametro::where('tipo','=',$tipo)->get();
    	if(count($estacion)!=0){
    		return response()->json(array('Estacion'=>$estacion,'status'=>'success'),200);
    	}else{
    		return response()->json(array('error'=>'No se encontraron estaciones con ese tipo','status'=>'error'),400);
    	}    	
    }

    //devuelve el parametro que mide
    public function getParametroEstacion(Request $request){
    	$parametro= $request->input('parametro',null);   	
    	$estacion = estacion_parametro::where('parametro','=',$parametro)->get();
    	if(count($estacion)!=0){
    		return response()->json(array('Estacion'=>$estacion,'status'=>'success'),200);
    	}else{
    		return response()->json(array('error'=>'No se encontraron estaciones con ese tipo','status'=>'error'),400);
    	}    	
    }

    //devuelve estacion temperatura por nombre
    public function getNombreTemperatura(Request $request){
    	$nombre= $request->input('nombre',null);   	
    	$estacion = estacion_parametro::where('nombre','=',$nombre)
                                        ->where('parametro','=','Temperatura Ambiente')
                                        ->get();
    	if(count($estacion)!=0){
    		return response()->json(array('Estacion'=>$estacion,'status'=>'success'),200);
    	}else{
    		return response()->json(array('error'=>'No se encontraron estaciones con ese tipo','status'=>'error'),400);
    	}    	
    }

    //devuelve estacion humedad por nombre
    public function getNombreHumedad(Request $request){
        $nombre= $request->input('nombre',null);    
        $estacion = estacion_parametro::where('nombre','=',$nombre)
                                        ->where('parametro','=','Humedad Relativa del Aire')
                                        ->get();
        if(count($estacion)!=0){
            return response()->json(array('Estacion'=>$estacion,'status'=>'success'),200);
        }else{
            return response()->json(array('error'=>'No se encontraron estaciones con ese tipo','status'=>'error'),400);
        }       
    }


	//obtiene todas las estaciones que miden temperatura
	public function getEstacionesTemperatura(){
		$estaciones=estacion_parametro::where('parametro','=','Temperatura Ambiente')->get();
        return response()->json(array(
            'Estaciones'=>$estaciones
        ),200);
	}

	//Obtiene todas las estaciones que miden humedad
	public function getEstacionesHumedad(){
		$estaciones=estacion_parametro::where('parametro','=','Humedad Relativa del Aire')->get();
        return response()->json(array(
            'Estaciones'=>$estaciones
		),200);
	}

	//obtiene temperatura por id de una estacion y fecha 
	public function Temperatura(Request $request){
        $nombre=$request->input('nombre',null);
        if($nombre!=null){
            $estacion=estacion_parametro::where('nombre','=',$nombre)
                                        ->where('parametro','=','Temperatura Ambiente')
                                        ->first();
                            
    		$id= $estacion->id;
    		$fechaInicio= new \DateTime($request->input('FI',null));
    		$fechaTermino= new \DateTime($request->input('FT',null));   	
    		$data = medicion_meteorologico::select('fecha','valor')
                                            ->where('estacion_parametro_id','=',$id)
    										->whereBetween('fecha',[$fechaInicio,$fechaTermino])
    										->get();
        	if(count($data)!=0){
        		return response()->json(array('Temperatura'=>$data,'status'=>'success'),200);
        	}else{
        		return response()->json(array('error'=>'No se encontraron estaciones con datos','status'=>'error'),400);
    		}

        }else{
        return response()->json(array('error'=>'No se encontraron estaciones con datos','status'=>'error'),400);
        }  
	}

	//obtiene temperatura por id de una estacion y fecha 
	public function Humedad(Request $request){
		$nombre=$request->input('nombre',null);
        if($nombre!=null){
            $estacion=estacion_parametro::where('nombre','=',$nombre)
                                        ->where('parametro','=','Humedad Relativa del Aire') 
                                        ->first();
                            
            $id= $estacion->id;
            $fechaInicio= new \DateTime($request->input('FI',null));
            $fechaTermino= new \DateTime($request->input('FT',null));       
            $data = medicion_meteorologico::select('fecha','valor')
                                            ->where('estacion_parametro_id','=',$id)
                                            ->whereBetween('fecha',[$fechaInicio,$fechaTermino])
                                            ->get();
            if(count($data)!=0){
                return response()->json(array('Humedad'=>$data,'status'=>'success'),200);
            }else{
                return response()->json(array('error'=>'No se encontraron estaciones con datos','status'=>'error'),400);
            }

        }else{
        return response()->json(array('error'=>'No se encontraron estaciones con datos','status'=>'error'),400);
        }   
		
	}
}
