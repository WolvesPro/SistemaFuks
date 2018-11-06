@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">Maquinaria</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Id</th>
									<th class="text-center">Nombre</th>
                                    <th class="text-center">Unidades</th>
                                    <th class="text-center">Descripción</th>
									<th class="text-center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($maquinarias) > 0)
                                @foreach($maquinarias as $maqui)
                            <tr>
                                <td class="text-center">{{$maqui->id_ma}}</td>
                                <td class="text-center">{{$maqui->nombre_ma}}</td>
								<td class="text-center">{{$maqui->unidades}}</td>
                                <td class="text-center">{{$maqui->descripcion}}</td>
								<td class="text-center">
									@if($maqui->deleted_at =="")
									<a class="btn btn-danger btn-md" href="{{URL::action('maquinariascontroller@eliminama',['id_ma'=>$maqui->id_ma])}}"> 
                                        Eliminar  
									</a>
									<a  class="btn btn-danger btn-md" href="{{URL::action('maquinariascontroller@modificamaquinaria',['id_ma'=>$maqui->id_ma])}}"> 
									Modificar 
								    </a>
										@else
									<a class="btn btn-primary btn-md" href="{{URL::action('maquinariascontroller@restauram',['id_ma'=>$maqui->id_ma])}}"> 
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