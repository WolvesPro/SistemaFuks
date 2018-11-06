@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">Alertas</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
									<th class="text-center">Id</th>
									<th class="text-center">Nombre</th>
									<th class="text-center">Tipo</th>
									<th class="text-center">Aperaciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($alertas) > 0)
                                @foreach($alertas as $aler)
                            <tr>
                                <td class="text-center">{{$aler->id_alerta}}</td>
                                <td class="text-center">{{$aler->nombre_alerta}}</td>
								<td class="text-center">{{$aler->tipo}}</td>
								<td class="text-center">
									@if($aler->deleted_at =="")
								<a class="btn btn-danger btn-md" href="{{URL::action('alertascontroller@eliminaa',['id_alerta'=>$aler->id_alerta])}}"> 
                                    Eliminar  
								</a>
								<a  class="btn btn-danger btn-md" href="{{URL::action('alertascontroller@modificaale',['id_alerta'=>$aler->id_alerta])}}"> 
									Modificar 
								</a>		
									@else			
								<a class="btn btn-primary btn-md" href="{{URL::action('alertascontroller@restauraa',['id_alerta'=>$aler->id_alerta])}}"> 
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