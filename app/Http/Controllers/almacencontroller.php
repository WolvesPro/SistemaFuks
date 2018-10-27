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
		$proceso = "ALTA DE CLIENTE";	
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
		    $proceso = "ELIMINAR CLIENTE";
			$mensaje = "El CLIENTE ha sido borrado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificam($idm)
	{
		$maestro = maestros::where('idm','=',$idm)->get();
		
		$idc = $maestro[0]->idc;
		
		$carrera=carreras::where('idc','=',$idc)->get();
		$demascarreras=carreras::where('idc','!=',$idc)->get();
		
		$carrera = carreras::where('idc','=',$idc)->get();
		return view('sistema.guardamaestro')
								  ->with('maestro',$maestro[0])
								  ->with('idc',$idc)
								  ->with('carrera',$carrera[0]->nombre)
								  ->with('demascarreras',$demascarreras);
	}
	
	
	
	public function editamaestro(Request $request)
	{
		$nombre = $request->nombre;
		$idm = $request->idm;
		$edad= $request->edad;
		$sexo = $request->sexo;
		$beca= $request->beca;
		$cp = $request->cp;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
		 'nombre'=>'required',['regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/'],
		 'edad'=>'required|integer|min:18|max:60',
		 'cp'=>'required',['regex:/^[0-9]{5}$/'],
		 'beca'=>'required',['regex:/^[0-9]+[.][0-9]{2}$/'],
		 'archivo'=>'image|mimes:jpg,jpeg,png,gif'
	     ]);
		 
		 
		 $file = $request->file('archivo');
	 if($file!="")
	 {
	 $ldate = date('Ymd_His_');
	 $img = $file->getClientOriginalName();
	 $img2 = $ldate.$img;
	 \Storage::disk('local')->put($img2, \File::get($file));
	 }
	 
		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $maest = maestros::find($idm);
			$maest->idm = $request->idm;
			$maest->nombre = $request->nombre;
			$maest->edad =$request->edad;
			$maest->sexo= $request->sexo;
			$maest->cp=$request->cp;
			$maest->beca=$request->beca;
			$maest->idc=$request->idc;
			if($file!='')
			{
			$maest->archivo = $img2;
			}
			$maest->save();
		$proceso = "ALTA DE MAESTRO";	
	    $mensaje="Registro modificado correctamente";
		return view('sistema.mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		 
	}
	
	public function restauraal($id_almacen)
	{
		almacenes::withTrashed()->where('id_almacen',$id_almacen)->restore();
		$proceso = "RESTAURACION DE PROVEEDOR";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
