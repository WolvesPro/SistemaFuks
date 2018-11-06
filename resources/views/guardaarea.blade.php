@extends('sistema.principal')
@section('contenido')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">Modifica Área</div>
										 <div class="card-body">
										 <div class="card-title">
                                            <h3 class="text-center title-2">Datos del Área</h3>
                                        </div>
			<form action = "{{route('editaarea')}}" method = 'POST' enctype='multipart/form-data'>
			
			{{csrf_field()}}

@if($errors->first('id_area')) 
<i> {{ $errors->first('id_area') }} </i> 
@endif	
			    <div class="form-group">
					<label for="id" class=" form-control-label">Id:</label>
						<input type="text" id="id" name="id_area" value="{{$area->id_area}}" readonly ='readonly' placeholder="Id" class="form-control">
				</div>
			
			{{csrf_field()}}

@if($errors->first('nomb_area')) 
<i> {{ $errors->first('nomb_area') }} </i> 
@endif	
			
				<div class="form-group">
					<label for="nombrearea" class=" form-control-label">Nombre de Área:</label>
						<input type="text" id="nombrearea" name="nomb_area" value="{{$area->nomb_area}}" placeholder="Nombre de Área" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('ubicacion')) 
<i> {{ $errors->first('ubicacion') }} </i> 
@endif	
				<div class="form-group">
					<label for="ubicacion" class=" form-control-label">Ubicación:</label>
						<input type="text" id="ubicacion" name="ubicacion" value="{{$area->ubicacion}}" placeholder="Ubicación" class="form-control">
				</div>
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Maquinaria:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="id_ma" id="maquinaria" class="form-control">
							<option value='{{$id_ma}}'>{{$maquinaria}}</option>
                            @foreach($demasmaquinarias as $maquin)
                            <option value='{{$maquin->id_ma}}'>{{$maquin->nombre_ma}}</option>
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