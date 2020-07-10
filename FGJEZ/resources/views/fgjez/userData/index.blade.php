@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Solicitudes <a href="userData/create"><button class="btn btn-success">Nuevo</button></a></h3>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Datos del Objeto Extraviado</th>
					<th>Hechos Ocurridos</th>
					<th>Correo Electrónicos</th>
					
					
				</thead>
               @foreach ($userDatas as $userD)
				<tr>
					<td>{{ $userD->id}}</td>
					<td>{{ $userD->nombre}}</td>
					<td>{{ $userD->apellidoPaterno}}</td>
					<td>{{ $userD->apellidoMaterno}}</td>
					<td>{{ $userD->datosObjeto}}</td>
					<td>{{ $userD->datosHechos}}</td>	
					<td>{{ $userD->correoUsuario}}</td>			
							
				</tr>
				@endforeach
			</table>
		</div>
		<div class="form-group">
        
        	<form> 
        	<div class="form-group">
            	<label for="correoElectronico">Correo Electrónico</label>
            	<input type="text" name="correoElectronico" class="form-control" placeholder="Correo Electrónico">
            </div>
        	
        			 <textarea name="observaciones" id="observaciones">
        			 </textarea>
        			<button class="btn btn-primary" type="submit">Enviar correo
            	 	</button>
        		
        	</form>
                    </div>
		{{$userDatas->render()}}
	</div>
</div>
	
@endsection