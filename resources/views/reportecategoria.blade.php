@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
					<div class="overview-wrap">
						<h2 class="title-1">Categorias</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-right">Id</th>
									<th class="text-right">Nombre</th>
									<th class="text-right">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($categorias) > 0)
                                @foreach($categorias as $cate)
                            <tr>
                                <td class="text-right">{{$cate->id_categoria}}</td>
                                <td class="text-right">{{$cate->nomb_categoria}}</td>
								<td class="text-right">
									@if($cate->deleted_at =="")
								<a class="btn btn-danger btn-md" href="{{URL::action('categoriascontroller@eliminaca',['id_categoria'=>$cate->id_categoria])}}"> 
                                    Eliminar  
								</a> 
								<a  class="btn btn-danger btn-md" href="{{URL::action('categoriascontroller@modificacategoria',['id_categoria'=>$cate->id_categoria])}}"> 
									Modificar 
								</a>
									@else			
								<a class="btn btn-primary btn-md" href="{{URL::action('categoriascontroller@restauraca',['id_categoria'=>$cate->id_categoria])}}"> 
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