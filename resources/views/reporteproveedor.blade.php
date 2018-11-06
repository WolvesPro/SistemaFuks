@extends('sistema.principal')
@section('contenido')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">Proveedores</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
									<th class="text-center">Id</th>
									<th class="text-center">Foto</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Razon Social</th>
                                    <th class="text-center">Telefono</th>
									<th class="text-center">E-Mail</th>
									<th class="text-center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($proveedores) > 0)
                                @foreach($proveedores as $prov)
                            <tr>
								<td class="text-center">{{$prov->id_prov}}</td>
                                <td class="text-center"><img src = "{{asset('archivos/'.$prov->archivo)}}"
									height =40 width=40></td>
                                <td class="text-center">{{$prov->nomb_prov}}</td>
								<td class="text-center">{{$prov->razon_social}}</td>
								<td class="text-center">{{$prov->telefono}}</td>
								<td class="text-center">{{$prov->email}}</td>
								<td class="text-center">
									@if($prov->deleted_at =="")
									<a class="btn btn-danger btn-md" href="{{URL::action('proveedorcontroller@eliminap',['id_prov'=>$prov->id_prov])}}"> 
                                        Eliminar  
									</a>
									<a  class="btn btn-danger btn-md" href="{{URL::action('proveedorcontroller@modificaproveedor',['id_prov'=>$prov->id_prov])}}"> 
									Modificar 
								    </a>
										@else
									<a class="btn btn-primary btn-md" href="{{URL::action('proveedorcontroller@restaurap',['id_prov'=>$prov->id_prov])}}"> 
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