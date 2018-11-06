@extends('sistema.principal')
@section('contenido')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">Alta Productos</div>
										 <div class="card-body">
										 <div class="card-title">
                                            <h3 class="text-center title-2">Datos de Productos</h3>
                                        </div>
			<form action = '{{route('guardaproducto')}}' method = 'POST' enctype='multipart/form-data'>
				{{csrf_field()}}

@if($errors->first('id_prod')) 
<i> {{ $errors->first('id_prod') }} </i> 
@endif	
			    <div class="form-group">
					<label for="id" class=" form-control-label">Id:</label>
						<input type="text" id="id" name="id_prod" value="{{$idpros}}" readonly ='readonly' placeholder="Id" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('nomb_prod')) 
<i> {{ $errors->first('nomb_prod') }} </i> 
@endif
				
				<div class="form-group">
					<label for="nombrep" class=" form-control-label">Nombre de Producto:</label>
						<input type="text" id="nombrep" name="nomb_prod" value="{{old('nomb_prod')}}" placeholder="Nombre de Producto" class="form-control">
				</div>
				
			{{csrf_field()}}

@if($errors->first('precio')) 
<i> {{ $errors->first('precio') }} </i> 
@endif	
				
				<div class="form-group">
					<label for="precio" class=" form-control-label">Precio:</label>
						<input type="text" id="precio" name="precio" value="{{old('precio')}}" placeholder="Precio" class="form-control">
				</div>
				{{csrf_field()}}

@if($errors->first('existencia')) 
<i> {{ $errors->first('existencia') }} </i> 
@endif	
				
				<div class="form-group">
					<label for="existencia" class=" form-control-label">Existencia:</label>
						<input type="text" id="existencia" name="existencia" value="{{old('existencia')}}" placeholder="Existencia" class="form-control">
							<span class="help-block">Por favor ingresa el número de piezas existentes</span>
				</div>
				{{csrf_field()}}

@if($errors->first('descripcion')) 
<i> {{ $errors->first('descripcion') }} </i> 
@endif	
				<div class="form-group">
					<label for="precio" class=" form-control-label">Descripcion:</label>
						<input type="text" id="precio" name="descripcion" value="{{old('descripcion')}}" placeholder="Precio" class="form-control">
				</div>
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Proveedor:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="id_prov" id="cliente" class="form-control">
                            @foreach($proveedores as $provee)
                            <option value='{{$provee->id_prov}}'>{{$provee->nomb_prov}}</option>
                            @endforeach
                        </select>
                    </div>		
                </div>
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Cliente:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="id_cliente" id="proveedor" class="form-control">
                            @foreach($clientes as $clien)
                            <option value='{{$clien->id_cliente}}'>{{$clien->nomb_cliente}}</option>
                            @endforeach
                        </select>
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