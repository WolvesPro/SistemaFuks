@extends('sistema.principal')
@section('contenido')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">Alta Proveedores</div>
										 <div class="card-body">
										 <div class="card-title">
                                            <h3 class="text-center title-2">Datos del Proveedor</h3>
                                        </div>
			<form action = "{{route('editaproveedor')}}" method = 'POST' enctype='multipart/form-data'>
			{{csrf_field()}}

@if($errors->first('id_prov')) 
<i> {{ $errors->first('id_prov') }} </i> 
@endif	
			    <div class="form-group">
					<label for="id" class=" form-control-label">Nombre:</label>
						<input type="text" id="id" name="id_prov" value="{{$proveedor->id_prov}}" readonly ='readonly' placeholder="Id" class="form-control">
				</div>
			{{csrf_field()}}

@if($errors->first('nomb_prov')) 
<i> {{ $errors->first('nomb_prov') }} </i> 
@endif	
				<div class="form-group">
					<label for="nombre" class=" form-control-label">Nombre:</label>
						<input type="text" id="nombre" name="nomb_prov" value="{{$proveedor->nomb_prov}}" placeholder="Nombre:" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('razon_social')) 
<i> {{ $errors->first('razon_social') }} </i> 
@endif	
				<div class="form-group">
					<label for="rs" class=" form-control-label">Razón Social:</label>
						<input type="text" id="rs" name="razon_social" value="{{$proveedor->razon_social}}" placeholder="Razón Social:" class="form-control">
				</div>
				{{csrf_field()}}

@if($errors->first('sector_comercial')) 
<i> {{ $errors->first('sector_comercial') }} </i> 
@endif
				<div class="form-group">
					<label for="sc" class=" form-control-label">Sector Comercial:</label>
						<input type="text" id="sc" name="sector_comercial" value="{{$proveedor->sector_comercial}}" placeholder="Sector Comercial" class="form-control">
				</div>
				{{csrf_field()}}

@if($errors->first('colonia')) 
<i> {{ $errors->first('colonia') }} </i> 
@endif	
				<div class="form-group">
					<label for="colonia" class=" form-control-label">Colonia:</label>
						<input type="text" id="colonia" name="colonia" value="{{$proveedor->colonia}}" placeholder="Colonia" class="form-control">
				</div>
				{{csrf_field()}}

@if($errors->first('calle')) 
<i> {{ $errors->first('calle') }} </i> 
@endif	
				<div class="form-group">
					<label for="Calle" class=" form-control-label">Calle:</label>
						<input type="text" id="calle" name="calle" value="{{$proveedor->calle}}" placeholder="Calle" class="form-control">
				</div>
				{{csrf_field()}}

@if($errors->first('numero_ext')) 
<i> {{ $errors->first('numero_ext') }} </i> 
@endif	
				<div class="form-group">
					<label for="ne" class=" form-control-label">Número Exterior:</label>
						<input type="text" id="ne" name="numero_ext"  value="{{$proveedor->numero_ext}}" placeholder="Número Exterior" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('telefono')) 
<i> {{ $errors->first('telefono') }} </i> 
@endif	
				<div class="form-group">
					<label for="telefono" class=" form-control-label">Teléfono:</label>
						<input type="text" id="telefono" name="telefono" value="{{$proveedor->telefono}}" placeholder="Teléfono" class="form-control">
				</div>
				{{csrf_field()}}

@if($errors->first('email')) 
<i> {{ $errors->first('email') }} </i> 
@endif
				<div class="form-group">
					<label for="email" class=" form-control-label">E-mail:</label>
						<input type="text" id="email" name="email" value="{{$proveedor->email}}" placeholder="E-mail" class="form-control">
							<span class="help-block">Por favor ingresa tu correo electrónico</span>
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
<img src = "{{asset('archivos/'.$proveedor->archivo)}}"
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
@stop