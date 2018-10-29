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
			$mensaje = "La categoria ha sido borrada Correctamente";
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
