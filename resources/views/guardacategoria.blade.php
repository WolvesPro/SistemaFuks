@extends('sistema.principal')
@section('contenido')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">Alta Categoría</div>
										 <div class="card-body">
										 <div class="card-title">
                                            <h3 class="text-center title-2">Datos de la Categoría</h3>
                                        </div>
			<form action = "{{route('editacategoria')}}" method = 'POST' enctype='multipart/form-data'>
				
				{{csrf_field()}}

@if($errors->first('id_categoria')) 
<i> {{ $errors->first('id_categoria') }} </i> 
@endif	
			    <div class="form-group">
					<label for="id" class=" form-control-label">Id:</label>
						<input type="text" id="id" name="id_categoria" value="{{$categoria->id_categoria}}" readonly ='readonly' placeholder="Id" class="form-control">
				</div>
				{{csrf_field()}}

@if($errors->first('nomb_categoria')) 
<i> {{ $errors->first('nomb_categoria') }} </i> 
@endif	
				
				<div class="form-group">
					<label for="nombrec" class=" form-control-label">Nombre de Categoría:</label>
						<input type="text" id="nombrec" name="nomb_categoria" value="{{$categoria->nomb_categoria}}" placeholder="Nombre de Categoría" class="form-control">
				</div>
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Producto:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="id_prod" id="producto" class="form-control">
						    <option value='{{$id_prod}}'>{{$producto}}</option>
                            @foreach($demasproductos as $produc)
                            <option value='{{$produc->id_prod}}'>{{$produc->nomb_prod}}</option>
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