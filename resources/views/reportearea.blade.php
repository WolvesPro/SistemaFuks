@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
					<div class="overview-wrap">
						<h2 class="title-1">Área</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Id</th>
									<th class="text-center">Nombre</th>
                                    <th class="text-center">Ubicacion</th>
									<th class="text-center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($areas) > 0)
                                @foreach($areas as $are)
                            <tr>
                                <td class="text-center">{{$are->id_area}}</td>
                                <td class="text-center">{{$are->nomb_area}}</td>
								<td class="text-center">{{$are->ubicacion}}</td>
								<td class="text-center">
									@if($are->deleted_at =="")
								<a class="btn btn-danger btn-md" href="{{URL::action('areascontroller@eliminaar',['id_area'=>$are->id_area])}}"> 
                                    Eliminar  
								</a>
								<a  class="btn btn-danger btn-md" href="{{URL::action('areascontroller@modificaarea',['id_area'=>$are->id_area])}}"> 
									Modificar 
								</a>	
									@else				
								<a class="btn btn-primary btn-md" href="{{URL::action('areascontroller@restauraar',['id_area'=>$are->id_area])}}"> 
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