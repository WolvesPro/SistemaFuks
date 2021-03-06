@extends('sistema.principal')
@section('contenido')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">Alta Cliente</div>
							<div class="card-body">
								<div class="card-title">
                                    <h3 class="text-center title-2">Datos del Cliente</h3>
                                </div>
									<form action = "{{route('editacliente')}}" method = 'POST' enctype='multipart/form-data'>
								{{csrf_field()}}
								@if($errors->first('id_cliente')) 
							<i> {{ $errors->first('id_cliente') }} </i> 
								@endif	
							<div class="row form-group">
								<div class="col-5">
									<label for="nombre" class=" form-control-label">Id Cliente:</label>
										<input type="text" id="nombre" name="id_cliente" value="{{$cliente->id_cliente}}" readonly ='readonly' placeholder="Id" class="form-control">
								</div>
							</div>
								{{csrf_field()}}
								@if($errors->first('nomb_cliente')) 
							<i>	{{ $errors->first('nomb_cliente') }} </i> 
								@endif
							<div class="form-group">
								<label for="nombre" class=" form-control-label">Nombre(s):</label>
									<input type="text" id="nombre" name="nomb_cliente" value="{{$cliente->nomb_cliente}}" placeholder="Nombre(s)" class="form-control">
							</div>
								{{csrf_field()}}
								@if($errors->first('colonia')) 
							<i> {{ $errors->first('colonia') }} </i> 
								@endif				
							<div class="form-group">
								<label for="colonia" class="form-control-label">Colonia:</label>
									<input type="text" id="colonia" name="colonia" value="{{$cliente->colonia}}" placeholder="Colonia" class="form-control">
							</div>
								{{csrf_field()}}
								@if($errors->first('calle')) 
							<i> {{ $errors->first('calle') }} </i> 
								@endif					
							<div class="form-group">
								<label for="Calle" class=" form-control-label">Calle:</label>
									<input type="text" id="calle" name="calle" value="{{$cliente->calle}}" placeholder="Calle" class="form-control">
							</div>
								{{csrf_field()}}
								@if($errors->first('numero_ext')) 
							<i> {{ $errors->first('numero_ext') }} </i> 
								@endif					
							<div class="form-group">
								<label for="ne" class=" form-control-label">Número Exterior:</label>
									<input type="text" id="ne" name="numero_ext" value="{{$cliente->numero_ext}}" placeholder="Número Exterior" class="form-control">
							</div>
								{{csrf_field()}}
								@if($errors->first('telefono')) 
							<i> {{ $errors->first('telefono') }} </i> 
								@endif				
							<div class="form-group">
								<label for="telefono" class=" form-control-label">Teléfono:</label>
									<input type="text" id="telefono" name="telefono" value="{{$cliente->telefono}}" placeholder="Teléfono" class="form-control">
							</div>
								{{csrf_field()}}
								@if($errors->first('email')) 
							<i> {{ $errors->first('email') }} </i> 
								@endif					
							<div class="form-group">
								<label for="email" class=" form-control-label">E-mail:</label>
									<input type="text" id="email" name="email" value="{{$cliente->email}}" placeholder="E-mail" class="form-control">
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="select" class=" form-control-label">Estado:</label>
								</div>
								<div class="col-12 col-md-9">
									<select name="id_est" id="estado" class="form-control">
									<option value='{{$id_est}}'>{{$estado}}</option>
										@foreach($demasestados as $esta)
									<option value='{{$esta->id_est}}'>{{$esta->Nombre_est}}</option>
										@endforeach
									</select>
								</div>		
							</div>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="select" class=" form-control-label">Municipio:</label>
								</div>
								<div class="col-12 col-md-9">
									<select name="id_municipio" id="municipio" class="form-control">
									<option value='{{$id_municipio}}'>{{$municipio}}</option>
										@foreach($demasmunicipios as $muni)
									<option value='{{$muni->id_municipio}}'>{{$muni->nomb_municipio}}</option>
										@endforeach
									</select>
								</div>
							</div>
								{{csrf_field()}}
								@if($errors->first('archivo')) 
							<i> {{ $errors->first('archivo') }} </i> 
								@endif
								
								<img src = "{{asset('archivos/'.$cliente->archivo)}}"
                                 height =150 width=150>
		                        <br>
							<div class="row form-group">
								<div class="col col-md-3">
									<label for="file-multiple-input" class=" form-control-label">Seleccionar Archivo</label>
								</div>
								<div class="col-12 col-md-9">
									<input type="file" id="file-multiple-input" name="archivo" multiple="" class="form-control-file">
								</div>
							</div>

                             <input type="hidden" name="activo" value="Si">							
							<div class="card-footer">
								<input type="submit" value='Guardar' class="btn btn-primary btn-md">
							</div>
									</form>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop