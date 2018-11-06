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
		 //'colonia'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
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
			$emplea->ape_paterno =$request->ape_paterno;
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
		$proceso = "ALTA EMPLEADO";	
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
			$mensaje = "El empleado ha sido eliminado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificaempleado($id_emp)
	{
		$empleado = empleados::where('id_emp','=',$id_emp)->get();
		
		$id_est = $empleado[0]->id_est;
		$id_municipio = $empleado[0]->id_municipio;
		$id_area = $empleado[0]->id_area;
		
		
		$estado=estados::where('id_est','=',$id_est)->get();
		$demasestados=estados::where('id_est','!=',$id_est)->get();
		
		$municipio=municipios::where('id_municipio','=',$id_municipio)->get();
		$demasmunicipios=municipios::where('id_municipio','!=',$id_municipio)->get();
		
		$area=areas::where('id_area','=',$id_area)->get();
		$demasareas=areas::where('id_area','!=',$id_area)->get();
		
		return view('sistema.guardaempleado')
								  ->with('empleado',$empleado[0])
								  ->with('id_est',$id_est)
								  ->with('id_municipio',$id_municipio)
								  ->with('id_area',$id_area)
								  ->with('estado',$estado[0]->Nombre_est)
								  ->with('demasestados',$demasestados)
								  ->with('municipio',$municipio[0]->nomb_municipio)
								  ->with('demasmunicipios',$demasmunicipios)
								  ->with('area',$area[0]->nomb_area)
								  ->with('demasareas',$demasareas);
	}
	
	
	
	public function editaempleado(Request $request)
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
		 //'colonia'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
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
		    $emplea = empleados::find($id_emp);
			$emplea->id_emp = $request->id_emp;
			$emplea->nomb_emp = $request->nomb_emp;
			$emplea->ape_paterno =$request->ape_paterno;
			$emplea->ape_materno= $request->ape_materno;
			$emplea->colonia= $request->colonia;
			$emplea->calle= $request->calle;
			$emplea->numero_ext=$request->numero_ext;
			$emplea->email=$request->email;
			$emplea->puesto=$request->puesto;
			$emplea->id_est=$request->id_est;
			$emplea->id_municipio=$request->id_municipio;
			$emplea->id_area=$request->id_area;
			if($file!='')
			{
			$emplea->archivo = $img2;
			}
			$emplea->save();
		$proceso = "MODIFICAR EMPLEADO";	
	    $mensaje="Registro modificado correctamente";
		return view("sistema.mensaje")
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
