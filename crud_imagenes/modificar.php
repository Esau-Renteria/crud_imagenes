<?php
	require 'conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM personas WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_assoc();
	
?>
<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/fontawesome.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('.delete').click(function(){
					var parent = $(this).parent().attr('id');
					var service = $(this).parent().attr('data');
					var dataString = 'id='+service;
					
					$.ajax({
						type: "POST",
						url: "del_file.php",
						data: dataString,
						success: function() {			
							location.reload();
						}
					});
				});                 
			});    
		</script>
		
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form method="POST" action="update.php" enctype="multipart/form-data" autocomplete="off">
				<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>" />
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required autofocus>
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['correo']; ?>" required>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="telefono">Teléfono</label>
						<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="estado_civil">Estado Civil</label>
						<select class="form-control" id="estado_civil" name="estado_civil">
							<option value="SOLTERO" <?php if($row['estado_civil']=='SOLTERO') echo 'selected'; ?>>SOLTERO</option>
							<option value="CASADO" <?php if($row['estado_civil']=='CASADO') echo 'selected'; ?>>CASADO</option>
							<option value="OTRO" <?php if($row['estado_civil']=='OTRO') echo 'selected'; ?>>OTRO</option>
						</select>
					</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="hijos">¿Tiene Hijos?</label>
						
						<div class="form-check">
							<input class="form-check-input" type="radio" name="hijos" id="hijosSi" value="1" <?php if($row['hijos']=='1') echo 'checked'; ?>>
							<label class="form-check-label" for="hijosSi">
								Si
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="hijos" id="hijosNo" value="0" <?php if($row['hijos']=='0') echo 'checked'; ?>>
							<label class="form-check-label" for="hijosNo">
								No
							</label>
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="intereses">Intereses</label>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Libros" id="libros" name="intereses[]" <?php if(strpos($row['intereses'], "Libros")!== false) echo 'checked'; ?>>
							<label class="form-check-label" for="libros">
								Libros
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Musica" id="musica" name="intereses[]" <?php if(strpos($row['intereses'], "Musica")!== false) echo 'checked'; ?>>
							<label class="form-check-label" for="musica">
								Música
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Deportes" id="deportes" name="intereses[]" <?php if(strpos($row['intereses'], "Deportes")!== false) echo 'checked'; ?>>
							<label class="form-check-label" for="deportes">
								Deportes
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="Otros" id="otros" name="intereses[]" <?php if(strpos($row['intereses'], "Otros")!== false) echo 'checked'; ?>>
							<label class="form-check-label" for="otros">
								Otros
							</label>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="archivo" name="archivo">
						<label class="custom-file-label" for="customFile">Seleccionar archivo</label>
					</div>
					
					<?php 
						$path = "files/".$id;
						if(file_exists($path)){
							$directorio = opendir($path);
							while ($archivo = readdir($directorio))
							{
								if (!is_dir($archivo)){
									echo "<div data='".$path."/".$archivo."'><a href='".$path."/".$archivo."' title='Ver Archivo Adjunto'><i class='fas fa-image'></i></a>";
									echo "$archivo <a href='#' class='delete' title='Ver Archivo Adjunto' ><i class='fas fa-trash'></i></a></div>";
									echo "<img src='files/$id/$archivo' width='300' />";
								}
							}
						}
						
					?>
					
				</div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-primary">Regresar</a>
						<button type="submit" class="btn btn-success">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>