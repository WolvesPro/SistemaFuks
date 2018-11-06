@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">Productos</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-right">Id Producto:</th>
									<th class="text-right">Nombre Producto:</th>
                                    <th class="text-right">Precio:</th>
									<th class="text-right">Existencia:</th>
									<th class="text-right">Descripcion:</th>
									<th class="text-right">Operaciones:</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($productos) > 0)
                                @foreach($productos as $produ)
                            <tr>
                                <td class="text-right">{{$produ->id_prod}}</td>
                                <td class="text-right">{{$produ->nomb_prod}}</td>
								<td class="text-right">{{$produ->precio}}</td>
								<td class="text-right">{{$produ->existencia}}</td>
								<td class="text-right">{{$produ->descripcion}}</td>
								<td class="text-right">
									@if($produ->deleted_at =="")
								<a class="btn btn-danger btn-md" href="{{URL::action('productoscontroller@eliminaprod',['id_prod'=>$produ->id_prod])}}"> 
                                    Eliminar  
								</a> 
								<a  class="btn btn-danger btn-md" href="{{URL::action('productoscontroller@modificaproducto',['id_prod'=>$produ->id_prod])}}"> 
									Modificar 
								    </a>
									@else
							   <a class="btn btn-primary btn-md" href="{{URL::action('productoscontroller@restauraprod',['id_prod'=>$produ->id_prod])}}"> 
									Restaurar  
								</a>
									@endif	
									@endforeach
									@endif
								</td>
                            </tr>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>         
        </div>
    </div>
</div>
@stop