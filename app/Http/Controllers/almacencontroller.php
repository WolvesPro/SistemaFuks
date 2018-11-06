<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\almacenes;
use App\areas;
use App\productos;

class almacencontroller extends Controller
{
     
    public function altaalmacen()
    {
		// ORM ELOQUENT
		//select * from carreras
		//$carreras=carreras::all();
		//select * from carreras where activo = 'si' order by nombre asc
		$areas=areas::where('activo','=','Si')
		                    ->orderBy('nomb_area','Asc')
							->get();
							
		$productos=productos::where('activo','=','Si')
		                    ->orderBy('nomb_prod','Asc')
							->get();
		
		  $clavequesigue = almacenes::withTrashed()->orderBy('id_almacen','desc')
								->take(1)
								->get();
           $idals = $clavequesigue[0]->id_almacen+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altaalmacen")
	   ->with('areas',$areas)
	   ->with('productos',$productos)
	   ->with('idals',$idals);
	}	
    public function guardaalmacen(Request $request)
    {
		$nomb_almacen = $request->nomb_almacen;
		$id_almacen = $request->id_almacen;
		
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_almacen'=>'required|numeric',
		 'nomb_almacen'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);

		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		     $alma = new almacenes;
			 $alma->id_almacen = $request->id_almacen;
			 $alma->nomb_almacen = $request->nomb_almacen;
			 $alma->id_prod = $request->id_prod;
			 $alma->id_area = $request->id_area;
			 $alma->save();
		$proceso = "ALTA DE ALMACEN";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reportealmacen()
	{
	$almacenes = almacenes::withTrashed()->orderBy('nomb_almacen','Asc')->get();
	return view ("sistema.reportealmacen")
	->with('almacenes',$almacenes);
	
	}
	public function eliminaal($id_almacen)
	{
		    almacenes::find($id_almacen)->delete();
		    $proceso = "ALMACEN ELIMINADO";
			$mensaje = "El almacen ha sido borrado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificaalma($id_almacen)
	{
		$almacen = almacenes::where('id_almacen','=',$id_almacen)->get();
		
		$id_prod = $almacen[0]->id_prod;
		
		$id_area = $almacen[0]->id_area;
		
		$producto=productos::where('id_prod','=',$id_prod)->get();
		$demasproductos=productos::where('id_prod','!=',$id_prod)->get();
		
		$area=areas::where('id_area','=',$id_area)->get();
		$demasareas=areas::where('id_area','!=',$id_area)->get();
		
		
		return view('sistema.guardaalmacen')
								  ->with('almacen',$almacen[0])
								  ->with('id_prod',$id_prod)
								  ->with('id_area',$id_area)
								  ->with('producto',$producto[0]->nomb_prod)
								  ->with('demasproductos',$demasproductos)
								  ->with('area',$area[0]->nomb_area)
								  ->with('demasareas',$demasareas);
	}
	
	
	
	public function editaalma(Request $request)
	{
		$nomb_almacen = $request->nomb_almacen;
		$id_almacen = $request->id_almacen;
		
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_almacen'=>'required|numeric',
		 'nomb_almacen'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);

		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		     $alma = almacenes::find($id_almacen);
			 $alma->id_almacen = $request->id_almacen;
			 $alma->nomb_almacen = $request->nomb_almacen;
			 $alma->id_prod = $request->id_prod;
			 $alma->id_area = $request->id_area;
			 $alma->save();
		$proceso = "ALMACEN MODIFICADO";	
	    $mensaje="Registro modificado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		 
	}
	
	public function restauraal($id_almacen)
	{
		almacenes::withTrashed()->where('id_almacen',$id_almacen)->restore();
		$proceso = "RESTAURACION DE ALMACEN";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
