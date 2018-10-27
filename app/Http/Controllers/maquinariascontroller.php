<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\maquinarias;
use App\alertas;

class maquinariascontroller extends Controller
{
     
    public function altamaquinaria()
    {
		// ORM ELOQUENT
		//select * from carreras
		//$carreras=carreras::all();  maquinariascontroller 
		//select * from carreras where activo = 'si' order by nombre asc
		  $alertas=alertas::where('activo','=','Si')
		                    ->orderBy('nombre_alerta','Asc')
							->get();
		
		  $clavequesigue = maquinarias::withTrashed()->orderBy('id_ma','desc')
								->take(1)
								->get();
           $idms = $clavequesigue[0]->id_ma+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altamaquinaria")
	   ->with('alertas',$alertas)
	   ->with('idms',$idms);
	}	
    public function guardamaquinaria(Request $request)
    {
		$nombre_ma = $request->nombre_ma;
		$id_ma = $request->id_ma;
		$unidades= $request->unidades;
		$descripcion = $request->descripcion;
		$activo = $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_ma'=>'required|numeric',
		 'nombre_ma'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'unidades'=>'required|numeric',
		 'descripcion'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú,0-9]+$/',
	     ]);
	 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $maqui = new maquinarias;
			$maqui->id_ma = $request->id_ma;
			$maqui->nombre_ma = $request->nombre_ma;
			$maqui->unidades = $request->unidades;
			$maqui->descripcion = $request->descripcion;
			$maqui->id_alerta = $request->id_alerta;
			$maqui->activo = $request->activo;
			$maqui->save();
		$proceso = "ALTA DE ALERTA";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reportemaquinaria()
	{
	$maquinarias = maquinarias::withTrashed()->orderBy('nombre_ma','Asc')->get();
	return view ("sistema.reportemaquinaria")
	->with('maquinarias',$maquinarias);
	
	}
	public function eliminama($id_ma)
	{
		    maquinarias::find($id_ma)->delete();
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
	
	public function restauram($id_ma)
	{
		maquinarias::withTrashed()->where('id_ma',$id_ma)->restore();
		$proceso = "RESTAURACION DE PROVEEDOR";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
