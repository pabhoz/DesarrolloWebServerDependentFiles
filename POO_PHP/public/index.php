<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Ejemplo POO</title>
		<link rel="stylesheet" type='text/css' href="<?php print(URL); ?>public/css/stylesheet.php">
		<script src="<?php print(URL);?>classes/jquery1.11.0.js"></script>
	</head>
	<body>

		<div id="supaForm">
			<form  action="<?php print(URL); ?>index.php" method="post" enctype="multipart/form-data">
	    	<ul>
	    		<li>
	    			<div class="title">Formulario para subir canciones</div>
	    		</li>
	    		<li>
	    			<input name="titulo" type="text" placeholder="Titulo" required>
	    		</li>
	    		<li>
	    			<input name="artista" type="text" placeholder="Artista" required>
	    		</li>
	    		<li>
	    			<input name="genero" type="text" placeholder="Genero" required>
	    		</li>
	    		<li>
	    			<input name="album" type="text" placeholder="Albúm" required>
	    		</li>
	    		<li>
	    			<label for="albumCover">Albúm Cover</label>
	    		</li>
	    		<li>
	    			<input data-target="jpg" id="albumCover" name="albumCover" type="file" required>
	    		</li>
	    		<li>
	    			<label for="sound">Archivo de audio</label>
	    		</li>
	    		<li>
	    			<input id="sound" data-target="mp3" name="sound" type="file" required>
	    		</li>
	    		<li>
	    			<input type="submit" name="submitBtn" value="Subir!">
    			</li>
    		</ul>
    	</form>
		</div>
		<script>
			$("#sound, #albumCover").change(function()
			{

				var value = $(this).val();
				var target = $(this).data("target");
				var obj = $(this);

				$.ajax({
					type: "POST",
	  				url: "<?php print(URL); ?>servicio.php",
	  				data: { metodo: "checkFile", parametros: value+","+target }
				}).done(function(response)
				{

					if(response == true){
						return true;
					}else{
						alert("El archivo de audio no es válido");
						obj.val("");
					}

				}
				);
			}
			);
		</script>
	</body>
</html>