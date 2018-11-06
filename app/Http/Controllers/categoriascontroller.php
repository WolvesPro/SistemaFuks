<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\categorias;
use App\productos;

class categoriascontroller extends Controller
{
     
    public function altacategoria()
    {
		// ORM ELOQUENT
		//select * from carreras
		//$carreras=carreras::all();
		//select * from carreras where activo = 'si' order by nombre asc
		$productos=productos::where('activo','=','Si')
		                    ->orderBy('nomb_prod','Asc')
							->get();
		
		  $clavequesigue = categorias::withTrashed()->orderBy('id_categoria','desc')
								->take(1)
								->get();
           $idcas = $clavequesigue[0]->id_categoria+1;
	 					
							
		//return $carreras;
	   return view ("sistema.altacategoria")
	   ->with('productos',$productos)
	   ->with('idcas',$idcas);
	}	
    public function guardacategoria(Request $request)
    {
		$nomb_categoria = $request->nomb_categoria;
		$id_categoria = $request->id_categoria;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_categoria'=>'required|numeric',
		 'nomb_categoria'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);

		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $cate = new categorias;
			$cate->id_categoria = $request->id_categoria;
			$cate->nomb_categoria = $request->nomb_categoria;
			$cate->id_prod = $request->id_prod;
			$cate->save();
		$proceso = "ALTA DE CATEGORIA";	
	    $mensaje="Registro guardado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}		
	
	public function reportecategoria()
	{
	$categorias = categorias::withTrashed()->orderBy('nomb_categoria','Asc')->get();
	return view ("sistema.reportecategoria")
	->with('categorias',$categorias);
	
	}
	public function eliminaca($id_categoria)
	{
		    categorias::find($id_categoria)->delete();
		    $proceso = "ELIMINAR CATEGORIA";
			$mensaje = "La categoria ha sido borrado Correctamente";
			return view ("sistema.mensaje")
			->with('proceso',$proceso)
			->with('mensaje',$mensaje);
	}
	public function modificacategoria($id_categoria)
	{
		$categoria = categorias::where('id_categoria','=',$id_categoria)->get();
		
		$id_prod = $categoria[0]->id_prod;
		
		$producto=productos::where('id_prod','=',$id_prod)->get();
		$demasproductos=productos::where('id_prod','!=',$id_prod)->get();
		
		
		return view('sistema.guardacategoria')
								  ->with('categoria',$categoria[0])
								  ->with('id_prod',$id_prod)
								  ->with('producto',$producto[0]->nomb_prod)
								  ->with('demasproductos',$demasproductos);
	}
	
	
	
	public function editacategoria(Request $request)
	{
		$nomb_categoria = $request->nomb_categoria;
		$id_categoria = $request->id_categoria;
		///NUNCA SE RECIBEN LOS ARCHIVOS
		
		
		$this->validate($request,[
	     'id_categoria'=>'required|numeric',
		 'nomb_categoria'=>'required|regex:/^[A-Z,a-z, ,ñ,á,é,í,ó,ú]+$/',
	     ]);

		 
		 
		 //insert into maestros(idm,nombre,edad,sexo) values('$idm',
		 //'$nombre')
		    $cate = categorias::find($id_categoria);
			$cate->id_categoria = $request->id_categoria;
			$cate->nomb_categoria = $request->nomb_categoria;
			$cate->id_prod = $request->id_prod;
			$cate->save();
		$proceso = "CATEGORIA MODIFICADA";	
	    $mensaje="Registro modificado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
		 
	}
	
	public function restauraca($id_categoria)
	{
		categorias::withTrashed()->where('id_categoria',$id_categoria)->restore();
		$proceso = "RESTAURACION DE CATEGORIA";	
	    $mensaje="Registro restaurado correctamente";
		return view("sistema.mensaje")
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	
	}
}
