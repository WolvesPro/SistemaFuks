@extends('sistema.principal')
@section('contenido')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">Alta Almacén</div>
										 <div class="card-body">
										 <div class="card-title">
                                            <h3 class="text-center title-2">Datos del Almacén</h3>
                                        </div>
			<form action = '{{route('guardaalmacen')}}' method = 'POST' enctype='multipart/form-data'>
				
				{{csrf_field()}}

@if($errors->first('id_almacen')) 
<i> {{ $errors->first('id_almacen') }} </i> 
@endif	
			    <div class="form-group">
					<label for="id" class=" form-control-label">Id:</label>
						<input type="text" id="id" name="id_almacen" value="{{$idals}}" readonly ='readonly' placeholder="Id" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('nomb_almacen')) 
<i> {{ $errors->first('nomb_almacen') }} </i> 
@endif	
				
				<div class="form-group">
					<label for="nombrea" class=" form-control-label">Nombre de Almacén:</label>
						<input type="text" id="nombrea" name="nomb_almacen" value="{{old('nomb_almacen')}}" placeholder="Nombre de Almacén" class="form-control">
				</div>
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Producto:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="id_prod" id="producto" class="form-control">
                            @foreach($productos as $produ)
                            <option value='{{$produ->id_prod}}'>{{$produ->nomb_prod}}</option>
                            @endforeach
                        </select>
                    </div>		
                </div>
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Área:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="id_area" id="area" class="form-control">
                            @foreach($areas as $are)
                            <option value='{{$are->id_area}}'>{{$are->nomb_area}}</option>
                            @endforeach
                        </select>
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