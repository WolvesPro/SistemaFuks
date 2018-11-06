@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
					<div class="overview-wrap">
						<h2 class="title-1">Almacen</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Id</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($almacenes) > 0)
                                @foreach($almacenes as $alma)
                            <tr>
                                <td class="text-center">{{$alma->id_almacen}}</td>
								<td class="text-center">{{$alma->nomb_almacen}}</td>
								<td class="text-center">
									@if($alma->deleted_at =="")
								<a class="btn btn-danger btn-md" href="{{URL::action('almacencontroller@eliminaal',['id_almacen'=>$alma->id_almacen])}}"> 
                                    Eliminar  
								</a>	
								<a  class="btn btn-danger btn-md" href="{{URL::action('almacencontroller@modificaalma',['id_almacen'=>$alma->id_almacen])}}"> 
									Modificar 
								</a>	
									@else						
							    <a class="btn btn-primary btn-md" href="{{URL::action('almacencontroller@restauraal',['id_almacen'=>$alma->id_almacen])}}"> 
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