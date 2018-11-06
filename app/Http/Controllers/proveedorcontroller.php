<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\proveedores;
use App\estados;
use App\municipios;

class proveedorcontroller extends Controller
{
     
    public function altaproveedores()
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
		
		  $clavequesigue = proveedores::withTrashed()->orderBy('id_prov','desc')
								->take(1)
								->get();
           $idps = $clavequesigue[0]->id_prov+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altaproveedores")
	   ->with('estados',$estados)
	   ->with('municipios',$municipios)
	   ->with('idps',$idps);
	}	
    public function guardaproveedor(Request $request)
    {
		$nomb_prov = $request->nomb_prov;
		$id_prov = $request->id_prov;
		$razon_social= $request->razon_social;
		$sector_comercial = $request->sector_comercial;
		$colonia= $request->colonia;
		$calle= $request->calle;
		$numero_ext= $request->numero_ext;
		$telefono = $request->telefono;
		$email = $request->email;
		$activo = $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_prov'=>'required|numeric',
		 'nomb_prov'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'razon_social'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'sector_comercial'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 //'colonia'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú,0-9]+$/',
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
		    $provee = new proveedores;
			$provee->id_prov = $request->id_prov;
			$provee->nomb_prov = $request->nomb_prov;
			$provee->razon_social = $request->razon_social;
			$provee->sector_comercial = $request->sector_comercial;
			$provee->colonia =$request->colonia;
			$provee->calle= $request->calle;
			$provee->numero_ext=$request->numero_ext;
			$provee->telefono=$request->telefono;
			$provee->email=$request->email;
			$provee->id_est=$request->id_est;
			$provee->id_municipio=$request->id_municipio;
			$provee->archivo = $img2;
			$provee->activo=$request->activo;
			$provee->save();
		$proceso = "ALTA PROVEEDOR";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reporteproveedor()
	{
	$proveedores = proveedores::withTrashed()->orderBy('nomb_prov','Asc')->get();
	return view ("sistema.reporteproveedor")
	->with('proveedores',$proveedores);
	
	}
	public function eliminap($id_prov)
	{
		    proveedores::find($id_prov)->delete();
		    $proceso = "ELIMINAR PROVEEDOR";
			$mensaje = "El proveedor ha sido borrado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificaproveedor($id_prov)
	{
		$proveedor = proveedores::where('id_prov','=',$id_prov)->get();
		
		$id_est = $proveedor[0]->id_est;
		$id_municipio = $proveedor[0]->id_municipio;
		
		$estado=estados::where('id_est','=',$id_est)->get();
		$demasestados=estados::where('id_est','!=',$id_est)->get();
		
		$municipio=municipios::where('id_municipio','=',$id_municipio)->get();
		$demasmunicipios=municipios::where('id_municipio','!=',$id_municipio)->get();
		
		return view('sistema.guardaproveedor')
								  ->with('proveedor',$proveedor[0])
								  ->with('id_est',$id_est)
								  ->with('id_municipio',$id_municipio)
								  ->with('estado',$estado[0]->Nombre_est)
								  ->with('demasestados',$demasestados)
								  ->with('municipio',$municipio[0]->nomb_municipio)
								  ->with('demasmunicipios',$demasmunicipios);
	}
	
	
	
	public function editaproveedor(Request $request)
	{
		$nomb_prov = $request->nomb_prov;
		$id_prov = $request->id_prov;
		$razon_social= $request->razon_social;
		$sector_comercial = $request->sector_comercial;
		$colonia= $request->colonia;
		$calle= $request->calle;
		$numero_ext= $request->numero_ext;
		$telefono = $request->telefono;
		$email = $request->email;
		$activo = $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_prov'=>'required|numeric',
		 'nomb_prov'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'razon_social'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'sector_comercial'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 //'colonia'=>'required|regex:/^[A-Z][A-Z,a-z, ,ñ,á,é,í,ó,ú,0-9]+$/',
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
		    $provee = proveedores::find($id_prov);
			$provee->id_prov = $request->id_prov;
			$provee->nomb_prov = $request->nomb_prov;
			$provee->razon_social = $request->razon_social;
			$provee->sector_comercial = $request->sector_comercial;
			$provee->colonia =$request->colonia;
			$provee->calle= $request->calle;
			$provee->numero_ext=$request->numero_ext;
			$provee->telefono=$request->telefono;
			$provee->email=$request->email;
			$provee->id_est=$request->id_est;
			$provee->id_municipio=$request->id_municipio;
			if($file!='')
			{
			$provee->archivo = $img2;
			}
			$provee->activo=$request->activo;
			$provee->save();
		$proceso = "PROVEEDOR MODIFICADO";	
	    $mensaje="Registro modificado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		 
	}
	
	public function restaurap($id_prov)
	{
		proveedores::withTrashed()->where('id_prov',$id_prov)->restore();
		$proceso = "RESTAURACION DE PROVEEDOR";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
