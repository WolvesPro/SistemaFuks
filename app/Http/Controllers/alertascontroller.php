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
			$mensaje = "Alerta ha sido borradaCorrectamente";
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
	
	public function restauraa($id_alerta)
	{
		alertas::withTrashed()->where('id_alerta',$id_alerta)->restore();
		$proceso = "RESTAURACION DE PROVEEDOR";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
