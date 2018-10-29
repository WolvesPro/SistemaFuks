<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\clientes;
use App\estados;
use App\municipios;

class clientescontroller extends Controller
{
     
    public function altacliente()
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
		
		  $clavequesigue = clientes::withTrashed()->orderBy('id_cliente','desc')
								->take(1)
								->get();
           $idcs = $clavequesigue[0]->id_cliente+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altaclientes")
	   ->with('estados',$estados)
	   ->with('municipios',$municipios)
	   ->with('idcs',$idcs);
	}	
    public function guardacliente(Request $request)
    {
		$nomb_cliente = $request->nomb_cliente;
		$id_cliente = $request->id_cliente;
		$colonia= $request->colonia;
		$calle = $request->calle;
		$numero_ext= $request->numero_ext;
		$telefono = $request->telefono;
		$email = $request->email;
		$activo = $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_cliente'=>'required|numeric',
		 'nomb_cliente'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'colonia'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'calle'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'numero_ext'=>'required|numeric',
		 'telefono'=>'required|regex:/^[0-9]{10}$/',
		 'email'=>'required|email',
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
		    $client = new clientes;
			$client->id_cliente = $request->id_cliente;
			$client->nomb_cliente = $request->nomb_cliente;
			$client->colonia =$request->colonia;
			$client->calle= $request->calle;
			$client->numero_ext=$request->numero_ext;
			$client->telefono=$request->telefono;
			$client->email=$request->email;
			$client->id_est=$request->id_est;
			$client->id_municipio=$request->id_municipio;
			$client->archivo = $img2;
			$client->activo=$request->activo;
			$client->save();
		$proceso = "ALTA DE CLIENTE";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reporteclientes()
	{
	$clientes = clientes::withTrashed()->orderBy('nomb_cliente','Asc')->get();
	return view ("sistema.reportecliente")
	->with('clientes',$clientes);
	
	}
	public function eliminac($id_cliente)
	{
		    clientes::find($id_cliente)->delete();
		    $proceso = "ELIMINAR CLIENTE";
			$mensaje = "El CLIENTE ha sido eliminado Correctamente";
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
	
	public function restaurac($id_cliente)
	{
		clientes::withTrashed()->where('id_cliente',$id_cliente)->restore();
		$proceso = "RESTAURACION DE CLIENTE";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
