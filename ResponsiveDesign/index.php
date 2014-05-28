<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Responsive Design Example</title>
		<link rel="stylesheet" href="css/stylesheet.css">
		<script src="js/jquery-1.11.0.min.js"></script>
	</head>
	<body>
		
			<header></header>
			
			<div id="contenedorContenido">


				<div id="busqueda">
					<input type="text"><div class="searchBtn">Buscar</div>
				</div>

				<div id="contenedorReproductor">

				<?php
	                		require_once 'php/connect.php';

	                		$select = "SELECT * FROM audios ORDER BY ID DESC";
	                		$result = mysql_query($select);
	                		$ultimaCancion = mysql_fetch_array($result);
	              ?>

					<div id="imagenAlbum">
	                    <img src="<?php echo $ultimaCancion["albumCover"]; ?>" alt="Collide With The Sky">
	                </div>
					<div id="informacionCancion">
						<ul>
							<li>
								<span class="titulo"><?php echo $ultimaCancion["titulo"]; ?></span>
							</li>
							<li>
								<span class="infoSecundaria artista"><?php echo $ultimaCancion["artista"]; ?></span>
							</li>
							<li>
								<span class="infoSecundaria album"><?php echo $ultimaCancion["album"]; ?></span>
							</li>
							<li>
								<span class="infoSecundaria genero"><?php echo $ultimaCancion["genero"]; ?></span>
							</li>
						</ul>
					</div>

					<audio id="reproductor" controls="true" src="<?php echo $ultimaCancion['uri']; ?>"></audio>
				</div>

				<div id="contenedorPlayList">
					<div id="canciones">
						<button class="fullBtn" id="uploadFormTrigger"> Subir Audio! </button>
						<?php
	                		require_once 'php/connect.php';

	                		$select = "SELECT * FROM audios;";
	                		$result = mysql_query($select);
							while($cancion = mysql_fetch_array($result)) {
							  echo '<div class="cancion songPicker" data-genero="'.$cancion["genero"].'" data-album="'.$cancion["album"].'" data-uri="'.$cancion["uri"].'" data-titulo="'.$cancion["titulo"].'" data-albumcover="'.$cancion["albumCover"].'" data-artista="'.$cancion["artista"].'">
								<div class="albumCover">
									<img src="'.$cancion["albumCover"].'" alt="'.$cancion["album"].'">
								</div>
								<div class="titulo">
									<span>'.$cancion["titulo"].'</span>
									<span class="playBtn">Reproducir</span>
								</div>
							</div>';
							}
	                	?>
					</div>
				</div>

				<div id="contenedorCanciones">
					<div id="clasificacion"></div>
					<div id="playList">
						<?php
	                		require_once 'php/connect.php';

	                		$select = "SELECT * FROM audios WHERE album = '$ultimaCancion[album]'";
	                		$result = mysql_query($select);
							while($cancion = mysql_fetch_array($result)) {
							  echo '<div class="cancion songPicker" data-genero="'.$cancion["genero"].'" data-album="'.$cancion["album"].'" data-uri="'.$cancion["uri"].'" data-titulo="'.$cancion["titulo"].'" data-albumcover="'.$cancion["albumCover"].'" data-artista="'.$cancion["artista"].'">
								<div class="albumCover">
									<img src="'.$cancion["albumCover"].'" alt="'.$cancion["album"].'">
								</div>
								<div class="titulo">
									<span>'.$cancion["titulo"].'</span>
									<span class="playBtn">Reproducir</span>
								</div>
							</div>';
							}
	                	?>
					</div>
				</div>
			</div>
		
		<!-- END APP -->
		<div id="uploadForm" class="hidden">
	    <div class="title">Parce suba su archivo!</div>
	    	<form action="php/subir.php" target="MyFakeIframe" method="post" enctype="multipart/form-data">
	    		<input name="title" type="text" placeholder="Titulo" required>
	    		<input name="artist" type="text" placeholder="Artista" required>
	    		<input name="album" type="text" placeholder="Álbum" required>
	    		<input name="albumCover" type="file"required>
	    		<input name="genre" type="text" placeholder="Genero" required>
	    		<input name="sound" type="file" required>
	    		<input type="submit" name="submitBtn" value="Subir!">
	    	</form>
	    </div>

	    <div id="iframeContainer">
	    	<iframe id="MyFakeIframe" name="MyFakeIframe" frameborder="1"></iframe>
	    </div>

		<script>
			$(function(){
				$('#uploadFormTrigger').click(function(){
					$('#uploadForm').slideToggle();
				});

				reasignarListeners();
			});

			function reasignarListeners(){
				$(".songPicker").click(function(){
					
					$.ajax({

							type: "POST",
			  				url: "php/buscar.php",
			  				data: { album: $(this).data("album"), artista: $(this).data("artista") },
			  				beforeSend: function(){
			  					$('#playList').html('Cargando canciones...');
			  				}

							}).done(function(msg) {

							 var msg = JSON.parse(msg);
							 var playList = $('#playList');

							 playList.html('');

							 for(var i = 0; i < Object.keys(msg).length; i++){
							 	//console.log(i);

							 	playList.append('<div class="cancion songPicker" data-genero="'+msg[i].genero+'" data-album="'+msg[i].album+'" data-uri="'+msg[i].uri+'" data-titulo="'+msg[i].titulo+'" data-albumcover="'+msg[i].albumCover+'" data-artista="'+msg[i].artista+'">\
									<div class="albumCover">\
										<img src="'+msg[i].albumCover+'" alt="'+msg[i].album+'">\
									</div>\
									<div class="titulo">\
										<span>'+msg[i].titulo+'</span>\
										<span class="playBtn">Reproducir</span>\
									</div>\
								</div>');
							 }
							 
							 console.log(msg);

							 reasignarListeners();

					});

					$("#informacionCancion .titulo").text($(this).data("titulo"));
					$("#informacionCancion .artista").text($(this).data("artista"));
					$("#informacionCancion .album").text($(this).data("album"));
					$("#informacionCancion .genero").text($(this).data("genero"));
					$("#imagenAlbum img").attr("src",$(this).data("albumcover"));
					$("#imagenAlbum img").attr("alt",$(this).data("album"));
					$("#reproductor").attr("src",$(this).data("uri"));
					var player = document.getElementById("reproductor");
					player.play();
				});
			}
		</script>
	</body>
</html>