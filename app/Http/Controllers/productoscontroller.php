<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\productos;
use App\clientes;
use App\proveedores;

class productoscontroller extends Controller
{
     
    public function altaproducto()
    {
		// ORM ELOQUENT
		//select * from carreras
		//$carreras=carreras::all();
		//select * from carreras where activo = 'si' order by nombre asc
		$clientes=clientes::where('activo','=','Si')
		                    ->orderBy('nomb_cliente','Asc')
							->get();
							
		$proveedores=proveedores::where('activo','=','Si')
		                    ->orderBy('nomb_prov','Asc')
							->get();					
		
		  $clavequesigue = productos::withTrashed()->orderBy('id_prod','desc')
								->take(1)
								->get();
           $idpros = $clavequesigue[0]->id_prod+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altaproducto")
	   ->with('clientes',$clientes)
	   ->with('proveedores',$proveedores)
	   ->with('idpros',$idpros);
	}	
    public function guardaproducto(Request $request)
    {
		$nomb_prod = $request->nomb_prod;
		$id_prod = $request->id_prod;
		$precio= $request->precio;
		$existencia = $request->existencia;
		$descripcion = $request->descripcion;
		$activo = $request->activo;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_prod'=>'required|numeric',
		 'nomb_prod'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
		 'precio'=>'required|regex:/^[0-9]+[.][0-9]{2}$/',
		 'existencia'=>'required|numeric',
		 'descripcion'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);

		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $produc = new productos;
			$produc->id_prod = $request->id_prod;
			$produc->nomb_prod = $request->nomb_prod;
			$produc->precio = $request->precio;
			$produc->existencia = $request->existencia;
			$produc->descripcion = $request->descripcion;
			$produc->id_prov = $request->id_prov;
			$produc->id_cliente = $request->id_cliente;
			$produc->activo = $request->activo;
			$produc->save();
		$proceso = "ALTA DE CLIENTE";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reporteproducto()
	{
	$productos = productos::withTrashed()->orderBy('nomb_prod','Asc')->get();
	return view ("sistema.reporteproducto")
	->with('productos',$productos);
	
	}
	public function eliminaprod($id_prod)
	{
		    productos::find($id_prod)->delete();
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
	
	public function restauraprod($id_prod)
	{
		productos::withTrashed()->where('id_prod',$id_prod)->restore();
		$proceso = "RESTAURACION DE PROVEEDOR";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
