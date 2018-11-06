<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\alertas;

class alertascontroller extends Controller
{
     
    public function altaalertas()
    {
		// ORM ELOQUENT
		//select * from carreras
		//$carreras=carreras::all();
		//select * from carreras where activo = 'si' order by nombre asc
		  $clavequesigue = alertas::withTrashed()->orderBy('id_alerta','desc')
								->take(1)
								->get();
           $idas = $clavequesigue[0]->id_alerta+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altaalertas")
	   ->with('idas',$idas);
	}	
    public function guardaalertas(Request $request)
    {
		$nombre_alerta = $request->nombre_alerta;
		$id_alerta = $request->id_alerta;
		$tipo = $request->tipo;
		$activo = $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_alerta'=>'required|numeric',
		 'nombre_alerta'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'tipo'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);
	 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $aler = new alertas;
			$aler->id_alerta = $request->id_alerta;
			$aler->nombre_alerta = $request->nombre_alerta;
			$aler->tipo = $request->tipo;
			$aler->activo =$request->activo;
			$aler->save();
		$proceso = "ALTA DE ALERTA";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reportealertas()
	{
	$alertas = alertas::withTrashed()->orderBy('nombre_alerta','Asc')->get();
	return view ("sistema.reportealertas")
	->with('alertas',$alertas);
	
	}
	public function eliminaa($id_alerta)
	{
		    alertas::find($id_alerta)->delete();
		    $proceso = "ELIMINAR ALERTA";
			$mensaje = "Alerta ha sido borrada Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificaale($id_alerta)
	{
		$alerta = alertas::where('id_alerta','=',$id_alerta)->get();
		$ida = $alerta[0]->ida;
		//$idc = $maestro[0]->idc;
		
		//$carrera=carreras::where('idc','=',$idc)->get();
		//$demascarreras=carreras::where('idc','!=',$idc)->get();
		
		//$carrera = carreras::where('idc','=',$idc)->get();
		return view('sistema.guardaalerta')
								  ->with('alerta',$alerta[0])
								  ->with('ida',$ida);
	}
	
	
	
	public function editaale(Request $request)
	{
		$nombre_alerta = $request->nombre_alerta;
		$id_alerta = $request->id_alerta;
		$tipo = $request->tipo;
		$activo = $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_alerta'=>'required|numeric',
		 'nombre_alerta'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'tipo'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);
	 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $aler = alertas::find($id_alerta);
			$aler->id_alerta = $request->id_alerta;
			$aler->nombre_alerta = $request->nombre_alerta;
			$aler->tipo = $request->tipo;
			$aler->activo =$request->activo;
			$aler->save();
		$proceso = "ALERTA MODIFICADA";	
	    $mensaje="Registro modificado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		 
	}
	
	public function restauraa($id_alerta)
	{
		alertas::withTrashed()->where('id_alerta',$id_alerta)->restore();
		$proceso = "RESTAURACION DE ALERTA CORRECTO";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
