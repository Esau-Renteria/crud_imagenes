<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container" style="padding-top:15px">
			<div class="row">
				<h3>NUEVO REGISTRO</h3>
			</div>
			
			<form method="POST" action="guardar.php" enctype="multipart/form-data" autocomplete="off">
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="telefono">Teléfono</label>
						<input type="text" class="form-control" id="telefono" name="telefono">
					</div>
					<div class="form-group col-md-6">
						<label for="estado_civil">Estado Civil</label>
						<select class="form-control" id="estado_civil" name="estado_civil">
							<option value="SOLTERO">SOLTERO</option>
							<option value="CASADO">CASADO</option>
							<option value="OTRO">OTRO</option>
						</select>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="hijos">¿Tiene Hijos?</label>
						
						<div class="form-check">
							<input class="form-check-input" type="radio" name="hijos" id="hijosSi" value="1" checked>
							<label class="form-check-label" for="hijosSi">
								Si
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="hijos" id="hijosNo" value="0">
							<label class="form-check-label" for="hijosNo">
								No
							</label>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="intereses">Intereses</label>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Libros" id="libros" name="intereses[]">
							<label class="form-check-label" for="libros">
								Libros
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Musica" id="musica" name="intereses[]">
							<label class="form-check-label" for="musica">
								Música
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Deportes" id="deportes" name="intereses[]">
							<label class="form-check-label" for="deportes">
								Deportes
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Otros" id="otros" name="intereses[]">
							<label class="form-check-label" for="otros">
								Otros
							</label>
						</div>
					</div>
				</div>
				
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="archivo" name="archivo">
					<label class="custom-file-label" for="customFile">Seleccionar archivo</label>
				</div>
				
				<br />
				
				<div class="form-group" style="padding-top:15px">
					<a href="index.php" class="btn btn-primary">Regresar</a>
					<button type="submit" class="btn btn-success">Guardar</button>
					
				</div>
			</form>
		</div>
	</body>
</html>				