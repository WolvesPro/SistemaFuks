@extends('sistema.principal')
@section('contenido')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">Alta Maquinaria</div>
										 <div class="card-body">
										 <div class="card-title">
                                            <h3 class="text-center title-2">Datos de Maquinaria</h3>
                                        </div>
			<form action = '{{route('guardamaquinaria')}}' method = 'POST' enctype='multipart/form-data'>
				
				{{csrf_field()}}

@if($errors->first('id_prov')) 
<i> {{ $errors->first('id_prov') }} </i> 
@endif	
			    <div class="form-group">
					<label for="id" class=" form-control-label">Nombre:</label>
						<input type="text" id="id" name="id_ma" value="{{$idms}}" readonly ='readonly' placeholder="Id" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('nombre_ma')) 
<i> {{ $errors->first('nombre_ma') }} </i> 
@endif	
				
				<div class="form-group">
					<label for="nombrema" class=" form-control-label">Nombre de Maquinaria:</label>
						<input type="text" id="nombrema" name="nombre_ma" value="{{old('nombre_ma')}}" placeholder="Nombre de Maquinaria" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('unidades')) 
<i> {{ $errors->first('unidades') }} </i> 
@endif	
				
				<div class="form-group">
					<label for="unidades" class=" form-control-label">Unidades:</label>
						<input type="text" id="unidades" name="unidades" value="{{old('unidades')}}" placeholder="unidades" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('descripcion')) 
<i> {{ $errors->first('descripcion') }} </i> 
@endif	
				
				<div class="form-group">
					<label for="unidades" class=" form-control-label">Descripcion:</label>
						<input type="text" id="descripcion" name="descripcion" value="{{old('descripcion')}}" placeholder="Descripcion" class="form-control">
				</div>
				
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Tipo Alerta:</label>
                    </div>
					<br>
                    <div class="col-12 col-md-9">
                        <select name="id_alerta" id="municipio" class="form-control">
                            @foreach($alertas as $aler)
                            <option value='{{$aler->id_alerta}}'>{{$aler->nombre_alerta}}</option>
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