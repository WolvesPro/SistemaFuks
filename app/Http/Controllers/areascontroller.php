<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\areas;
use App\maquinarias;

class areascontroller extends Controller
{
     
    public function altaarea()
    {
		// ORM ELOQUENT
		//select * from carreras
		//$carreras=carreras::all();
		//select * from carreras where activo = 'si' order by nombre asc
		$maquinarias=maquinarias::where('activo','=','Si')
		                    ->orderBy('nombre_ma','Asc')
							->get();
		
		  $clavequesigue = areas::withTrashed()->orderBy('id_area','desc')
								->take(1)
								->get();
           $idars = $clavequesigue[0]->id_area+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altaarea")
	   ->with('maquinarias',$maquinarias)
	   ->with('idars',$idars);
	}	
    public function guardaarea(Request $request)
    {
		$nomb_area = $request->nomb_area;
		$id_area = $request->id_area;
		$ubicacion= $request->ubicacion;
		$activo= $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_area'=>'required|numeric',
		 'nomb_area'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'ubicacion'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);

		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $are = new areas;
			$are->id_area = $request->id_area;
			$are->nomb_area = $request->nomb_area;
			$are->ubicacion = $request->ubicacion;
			$are->id_ma = $request->id_ma;
		    $are->activo = $request->activo;
			$are->save();
		$proceso = "ALTA AREAS";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reportearea()
	{
	$areas = areas::withTrashed()->orderBy('nomb_area','Asc')->get();
	return view ("sistema.reportearea")
	->with('areas',$areas);
	
	}
	public function eliminaar($id_area)
	{
		    areas::find($id_area)->delete();
		    $proceso = "ELIMINA AREA";
			$mensaje = "El area ha sido borrado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificaarea($id_area)
	{
		$area = areas::where('id_area','=',$id_area)->get();
		
		$id_ma = $area[0]->id_ma;
		
		$maquinaria=maquinarias::where('id_ma','=',$id_ma)->get();
		$demasmaquinarias=maquinarias::where('id_ma','!=',$id_ma)->get();
		
		return view('sistema.guardaarea')
								  ->with('area',$area[0])
								  ->with('id_ma',$id_ma)
								  ->with('maquinaria',$maquinaria[0]->nombre_ma)
								  ->with('demasmaquinarias',$demasmaquinarias);
	}
	
	
	
	public function editaarea(Request $request)
	{
		$nomb_area = $request->nomb_area;
		$id_area = $request->id_area;
		$ubicacion= $request->ubicacion;
		$activo= $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_area'=>'required|numeric',
		 'nomb_area'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'ubicacion'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);

		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $are = areas::find($id_area);
			$are->id_area = $request->id_area;
			$are->nomb_area = $request->nomb_area;
			$are->ubicacion = $request->ubicacion;
			$are->id_ma = $request->id_ma;
		    $are->activo = $request->activo;
			$are->save();
		$proceso = "AREA MODIFICADA";	
	    $mensaje="Registro modificado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		 
	}
	
	public function restauraar($id_area)
	{
		areas::withTrashed()->where('id_area',$id_area)->restore();
		$proceso = "RESTAURACION DE AREA";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
