@extends('sistema.principal')
@section('contenido')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">Modifica Empleado</div>
										 <div class="card-body">
										 <div class="card-title">
                                            <h3 class="text-center title-2">Datos del Empleado</h3>
                                        </div>
			<form action = "{{route('editaempleado')}}" method = 'POST' enctype='multipart/form-data'>
				
				{{csrf_field()}}

@if($errors->first('id_emp')) 
<i> {{ $errors->first('id_emp') }} </i> 
@endif
<div class="form-group">
<label for="nombre" class=" form-control-label">Id Cliente:</label>
<input type="text" id="nombre" name="id_emp" value="{{$empleado->id_emp}}" readonly ='readonly' placeholder="Id" class="form-control">
</div>
				{{csrf_field()}}

@if($errors->first('nomb_emp')) 
<i> {{ $errors->first('nomb_emp') }} </i> 
@endif
				<div class="form-group">
					<label for="nombre" class=" form-control-label">Nombre(s):</label>
						<input type="text" id="nombre" name="nomb_emp"  value="{{$empleado->nomb_emp}}" placeholder="Nombre(s)" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('ape_paterno')) 
<i> {{ $errors->first('ape_paterno') }} </i> 
@endif
				<div class="form-group">
					<label for="ap" class=" form-control-label">Apellido Paterno:</label>
						<input type="text" id="ap" name="ape_paterno"  value="{{$empleado->ape_paterno}}" placeholder="Apellido Paterno" class="form-control">
				</div>
				{{csrf_field()}}

@if($errors->first('ape_materno')) 
<i> {{ $errors->first('ape_materno') }} </i> 
@endif
				
				<div class="form-group">
					<label for="am" class=" form-control-label">Apellido Materno:</label>
						<input type="text" id="am" name="ape_materno" value="{{$empleado->ape_materno}}" placeholder="Apellido Materno" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('colonia')) 
<i> {{ $errors->first('colonia') }} </i> 
@endif
				<div class="form-group">
					<label for="colonia" class=" form-control-label">Colonia:</label>
						<input type="text" id="colonia" name="colonia" value="{{$empleado->colonia}}" placeholder="Colonia" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('calle')) 
<i> {{ $errors->first('calle') }} </i> 
@endif
				
				<div class="form-group">
					<label for="Calle" class=" form-control-label">Calle:</label>
						<input type="text" id="calle" name="calle" value="{{$empleado->calle}}" placeholder="Calle" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('numero_ext')) 
<i> {{ $errors->first('numero_ext') }} </i> 
@endif
				
				<div class="row form-group">
				<div class="col-6">
					<label for="ne" class=" form-control-label">Número Exterior:</label>
						<input type="text" id="ne" name="numero_ext" value="{{$empleado->numero_ext}}" placeholder="Número Exterior" class="form-control">
				</div>
				</div>
				{{csrf_field()}}

@if($errors->first('email')) 
<i> {{ $errors->first('email') }} </i> 
@endif
				
				<div class="form-group">
					<label for="email" class=" form-control-label">E-mail:</label>
						<input type="text" id="email" name="email" value="{{$empleado->email}}" placeholder="E-mail" class="form-control">
							<span class="help-block">Por favor ingresa tu correo electrónico</span>
				</div>
				
						{{csrf_field()}}

@if($errors->first('puesto')) 
<i> {{ $errors->first('puesto') }} </i> 
@endif
				
				<div class="form-group">
					<label for="puesto" class=" form-control-label">Puesto:</label>
						<input type="text" id="puesto" name="puesto" value="{{$empleado->puesto}}" placeholder="Puesto" class="form-control">
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
				
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Área:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="id_area" id="area" class="form-control">
						<option value='{{$id_area}}'>{{$area}}</option>
                            @foreach($demasareas as $are)
						<option value='{{$are->id_area}}'>{{$are->nomb_area}}</option>
							@endforeach
                        </select>
                    </div>
                </div>
				{{csrf_field()}}
								@if($errors->first('archivo')) 
							<i> {{ $errors->first('archivo') }} </i> 
								@endif
		<img src = "{{asset('archivos/'.$empleado->archivo)}}"
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
				<div class="card-footer">
<input type="submit" value='Guardar' class="btn btn-primary btn-md">
</div>
			</form>
		</div>
		
	</div>
</div>
@stop