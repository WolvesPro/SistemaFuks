@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="title-1">Empleados</h2>
					</div><br>
                    <div class="table-responsive table--no-card m-b-100">
                        <table class="table table-borderless table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Id</th>
									<th class="text-center">Foto</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">E-Mail</th>
									<th class="text-center">Puesto</th>
									<th class="text-center">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
								@if(count($empleados) > 0)
                                @foreach($empleados as $emp)
                            <tr>
                                <td class="text-center">{{$emp->id_emp}}</td>
                                <td><img src = "{{asset('archivos/'.$emp->archivo)}}"
									height =40 width=40></td>
                                <td class="text-center">{{$emp->nomb_emp}}</td>
								<td class="text-center">{{$emp->email}}</td>
								<td class="text-center">{{$emp->puesto}}</td>
								<td class="text-center">
									@if($emp->deleted_at =="")
									<a class="btn btn-danger btn-md" href="{{URL::action('empleadoscontroller@eliminaem',['id_emp'=>$emp->id_emp])}}"> 
                                        Eliminar  
									</a>
                                    <a  class="btn btn-danger btn-md" href="{{URL::action('empleadoscontroller@modificaempleado',['id_emp'=>$emp->id_emp])}}"> 
									Modificar 
								    </a>									
										@else		
									<a class="btn btn-primary btn-md" href="{{URL::action('empleadoscontroller@restauraem',['id_emp'=>$emp->id_emp])}}"> 
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