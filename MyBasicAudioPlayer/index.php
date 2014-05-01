<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Responsive Design</title>
	    <link rel="stylesheet" href="./css/stylesheet.css">
	    <script src="js/jquery-1.11.0.min.js"></script>
	</head>
	<body>
	<header>
		<div class="superior">
		</div>
		
	</header>
	<div id="content">
        <div class="lateralIzquierdo">
            <section class="noticias">
                <article class="bigOne">
                	
                	<audio id="thePlayer" src="" controls="true"></audio>

                </article>
                
                <article></article>
                
            </section>
        </div>
		<div class="lateralDerecho">
            <div class="module">
                <div class="lateralTitle">
                	<button class="fullBtn" id="uploadFormTrigger"> Subir Audio! </button>
                </div>
                <div class="buttonContainer">
                	<?php
                		require_once 'php/connect.php';

                		$select = "SELECT * FROM audios;";
                		$result = mysql_query($select);
						while($row = mysql_fetch_array($result)) {
						  echo '<div class="element">
									<button class="songPicker" data-uri="'.$row["uri"].'" >'.$row["title"].'</button>
						  		</div>';
						}
                	?>
                </div>
            </div>
            
        </div>
        
	</div>
    <div class="footer">
            
    </div>
    <div id="uploadForm" class="hidden">
    <div class="title">Parce suba su archivo!</div>
    	<form action="php/subir.php" target="MyFakeIframe" method="post" enctype="multipart/form-data">
    		<input name="title" type="text" placeholder="Titulo" required>
    		<input name="artist" type="text" placeholder="Artista" required>
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

		$(".songPicker").click(function(){
			console.log("click");
			$("#thePlayer").attr("src",$(this).data("uri"));
			var player = document.getElementById("thePlayer");
			player.play();
		});
	});
	</script>
	</body>
</html>