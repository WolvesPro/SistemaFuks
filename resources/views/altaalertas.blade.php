@extends('sistema.principal')
@section('contenido')

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="card-header">Alta Alertas</div>
										 <div class="card-body">
										 <div class="card-title">
                                            <h3 class="text-center title-2">Datos de la Alerta</h3>
                                        </div>
			<form action = '{{route('guardaalertas')}}' method = 'POST' enctype='multipart/form-data'>
				
				{{csrf_field()}}

@if($errors->first('id_alerta')) 
<i> {{ $errors->first('id_alerta') }} </i> 
@endif	
			    <div class="form-group">
					<label for="id" class=" form-control-label">Id Alerta:</label>
						<input type="text" id="id" name="id_alerta" value="{{$idas}}" readonly ='readonly' placeholder="Id" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('nombre_alerta')) 
<i> {{ $errors->first('nombre_alerta') }} </i> 
@endif
				<div class="form-group">
					<label for="nombrearealerta" class=" form-control-label">Nombre de Alerta:</label>
						<input type="text" id="nombrearealerta" name="nombre_alerta" value="{{old('nombre_alerta')}}" placeholder="Nombre de Alerta" class="form-control">
				</div>
				
				{{csrf_field()}}

@if($errors->first('tipo')) 
<i> {{ $errors->first('tipo') }} </i> 
@endif
				<div class="form-group">
					<label for="tipo" class=" form-control-label">Tipo de Alerta:</label>
						<input type="text" id="tipo" name="tipo" value="{{old('tipo')}}" placeholder="Tipo de Alerta" class="form-control">
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