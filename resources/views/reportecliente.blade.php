@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">Clientes</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
									<th class="text-center">Id</th>
									<th class="text-center">Imagen</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Telefono</th>
									<th class="text-center">E-Mail</th>
									<th class="text-center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($clientes) > 0)
                                @foreach($clientes as $cli)
                            <tr>
                                <td class="text-center">{{$cli->id_cliente}}</td>
                                <td class="text-center"><img src = "{{asset('archivos/'.$cli->archivo)}}"
									height =40 width=40></td>
                                <td class="text-center">{{$cli->nomb_cliente}}</td>
								<td class="text-center">{{$cli->telefono}}</td>
								<td class="text-center">{{$cli->email}}</td>
								<td class="text-center">
									@if($cli->deleted_at =="")
									<a class="btn btn-danger btn-md" href="{{URL::action('clientescontroller@eliminac',['id_cliente'=>$cli->id_cliente])}}"> 
										Eliminar  
									</a>
									<a  class="btn btn-danger btn-md" href="{{URL::action('clientescontroller@modificacliente',['id_cliente'=>$cli->id_cliente])}}"> 
									Modificar 
								    </a>
										@else						
									<a class="btn btn-primary btn-md" href="{{URL::action('clientescontroller@restaurac',['id_cliente'=>$cli->id_cliente])}}"> 
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