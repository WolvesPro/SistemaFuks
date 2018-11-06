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
		$proceso = "ALTA DE PRODUCTO";	
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
		    $proceso = "ELIMINAR PRODUCTO";
			$mensaje = "El producto ha sido borrado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificaproducto($id_prod)
	{
		$producto = productos::where('id_prod','=',$id_prod)->get();
		
		$id_prov = $producto[0]->id_prov;
		$id_cliente = $producto[0]->id_cliente;
		
		$proveedor=proveedores::where('id_prov','=',$id_prov)->get();
		$demasprovedores=proveedores::where('id_prov','!=',$id_prov)->get();
		
		$cliente=clientes::where('id_cliente','=',$id_cliente)->get();
		$demasclientes=clientes::where('id_cliente','!=',$id_cliente)->get();
		
		return view('sistema.guardaproducto')
								  ->with('producto',$producto[0])
								  ->with('id_prov',$id_prov)
								  ->with('id_cliente',$id_cliente)
								  ->with('proveedor',$proveedor[0]->nomb_prov)
								  ->with('demasprovedores',$demasprovedores)
								  ->with('cliente',$cliente[0]->nomb_cliente)
								  ->with('demasclientes',$demasclientes);
	}
	
	
	
	public function editaproducto(Request $request)
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
		    $produc = productos::find($id_prod);
			$produc->id_prod = $request->id_prod;
			$produc->nomb_prod = $request->nomb_prod;
			$produc->precio = $request->precio;
			$produc->existencia = $request->existencia;
			$produc->descripcion = $request->descripcion;
			$produc->id_prov = $request->id_prov;
			$produc->id_cliente = $request->id_cliente;
			$produc->activo = $request->activo;
			$produc->save();
		$proceso = "MODIFICA PRODUCTO";	
	    $mensaje="Registro modificado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		 
	}
	
	public function restauraprod($id_prod)
	{
		productos::withTrashed()->where('id_prod',$id_prod)->restore();
		$proceso = "RESTAURACION DE PRODUCTO";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
