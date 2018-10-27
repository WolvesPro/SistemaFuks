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
		$proceso = "ALTA DE CLIENTE";	
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
	
	public function restauraar($id_area)
	{
		areas::withTrashed()->where('id_area',$id_area)->restore();
		$proceso = "RESTAURACION DE PROVEEDOR";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
