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
		 //'colonia'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
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
			$mensaje = "El cliente ha sido eliminado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificacliente($id_cliente)
	{
		$cliente = clientes::where('id_cliente','=',$id_cliente)->get();
		
		$id_est = $cliente[0]->id_est;
		$id_municipio = $cliente[0]->id_municipio;
		
		
		$estado=estados::where('id_est','=',$id_est)->get();
		$demasestados=estados::where('id_est','!=',$id_est)->get();
		
		$municipio=municipios::where('id_municipio','=',$id_municipio)->get();
		$demasmunicipios=municipios::where('id_municipio','!=',$id_municipio)->get();
		
		return view('sistema.guardacliente')
								  ->with('cliente',$cliente[0])
								  ->with('id_est',$id_est)
								  ->with('id_municipio',$id_municipio)
								  ->with('estado',$estado[0]->Nombre_est)
								  ->with('demasestados',$demasestados)
								  ->with('municipio',$municipio[0]->nomb_municipio)
								  ->with('demasmunicipios',$demasmunicipios);
	}
	
	
	
	public function editacliente(Request $request)
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
		 //'colonia'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
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
		    $client = clientes::find($id_cliente);
			$client->id_cliente = $request->id_cliente;
			$client->nomb_cliente = $request->nomb_cliente;
			$client->colonia =$request->colonia;
			$client->calle= $request->calle;
			$client->numero_ext=$request->numero_ext;
			$client->telefono=$request->telefono;
			$client->email=$request->email;
			$client->id_est=$request->id_est;
			$client->id_municipio=$request->id_municipio;
			if($file!='')
			{
			$client->archivo = $img2;
			}
			$client->activo=$request->activo;
			$client->save();
		$proceso = "CLIENTE MODIFICADO";	
	    $mensaje="Registro modificado correctamente";
		return view("sistema.mensaje")
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
