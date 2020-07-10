@extends ('layouts.admin')
@section ('contenido')
<?php mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

?>
<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Solicitud</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'fgjez/userData','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="apellidoPaterno">Apellido Paterno</label>
            	<input type="text" name="apellidoPaterno" class="form-control" placeholder="Apellido...">
            </div>
            <div class="form-group">
            	<label for=correoUsuario>Correo Electrónico</label>
            	<input type="text" name="correoUsuario" class="form-control" placeholder="Correo...">
            </div>
            <div class="form-group">
            	<label for="datosObjeto">Datos del objeto extraviado</label>
            	<input type="text" name="datosObjeto" class="form-control" placeholder="Datos del objeto...">
            </div>
            <div class="form-group">
            	<label for="datosHechos">Datos sobre el extravío</label>
            	<input type="text" name="datosHechos" class="form-control" placeholder="¿Cómo sucedió?">
            </div>
            <div>
              <span>Subir identificación:</span>
              <input type="file" name="rutaArchivo" id="rutaArchivo	" />
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection