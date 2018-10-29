<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\empleados;
use App\estados;
use App\municipios;
use App\areas;

class empleadoscontroller extends Controller
{
     
    public function altaempleado()
    {
		// ORM ELOQUENT
		//select * from carreras
		//$carreras=carreras::all();
		//select * from carreras where activo = 'si' order by nombre asc
		$estados=estados::where('activo','=','Si')
		                    ->orderBy('Nombre_est','Asc')
							->get();
							
		$municipios=municipios::where('activo','=','Si')
		                    ->orderBy('nomb_municipio','Asc')
							->get();
							
		$areas=areas::where('activo','=','Si')
		                    ->orderBy('nomb_area','Asc')
							->get();					
		
		  $clavequesigue = empleados::withTrashed()->orderBy('id_emp','desc')
								->take(1)
								->get();
           $idems = $clavequesigue[0]->id_emp+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altaempleado")
	   ->with('estados',$estados)
	   ->with('municipios',$municipios)
	   ->with('areas',$areas)
	   ->with('idems',$idems);
	}	
    public function guardaempleado(Request $request)
    {
		$nomb_emp = $request->nomb_emp;
		$id_emp = $request->id_emp;
		$ape_paterno= $request->ape_paterno;
		$ape_materno = $request->ape_materno;
		$colonia= $request->colonia;
		$calle = $request->calle;
		$numero_ext = $request->numero_ext;
		$email = $request->email;
		$puesto = $request->puesto;
		
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_emp'=>'required|numeric',
		 'nomb_emp'=>'required|regex:/^[A-Z][A-Z,,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'ape_paterno'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'ape_materno'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'colonia'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'calle'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú,0-9]+$/',
		 'numero_ext'=>'required|numeric',
		 'email'=>'required|email',
		 'puesto'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
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
	 else
	 {
      $img2= 'sinfoto.png';
	 }
		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $emplea = new empleados;
			$emplea->id_emp = $request->id_emp;
			$emplea->nomb_emp = $request->nomb_emp;
			$emplea->ape_paterno =$request->ape_materno;
			$emplea->ape_materno= $request->ape_materno;
			$emplea->colonia= $request->colonia;
			$emplea->calle= $request->calle;
			$emplea->numero_ext=$request->numero_ext;
			$emplea->email=$request->email;
			$emplea->puesto=$request->puesto;
			$emplea->id_est=$request->id_est;
			$emplea->id_municipio=$request->id_municipio;
			$emplea->id_area=$request->id_area;
			$emplea->archivo = $img2;
			$emplea->save();
		$proceso = "ALTA DE EMPLEADO";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reporteempleado()
	{
	$empleados = empleados::withTrashed()->orderBy('nomb_emp','Asc')->get();
	return view ("sistema.reporteempleado")
	->with('empleados',$empleados);
	
	}
	public function eliminaem($id_emp)
	{
		    empleados::find($id_emp)->delete();
		    $proceso = "ELIMINAR EMPLEADO";
			$mensaje = "El EMPLEADO ha sido eliminado Correctamente";
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
	
	public function restauraem($id_emp)
	{
		empleados::withTrashed()->where('id_emp',$id_emp)->restore();
		$proceso = "RESTAURACION DE EMPLEADO";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
