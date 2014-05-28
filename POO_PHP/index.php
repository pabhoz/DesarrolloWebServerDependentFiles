<?php 
	require_once './config.php';
	
	if(empty($_POST)){
		require 'public/index.php';
		if(isset($_GET["succes"])){

			$response = ($_GET["succes"] == 1) ? "Subida Exitosa" : "Error en subida, intente mas tarde";
			echo "<script>alert('".$response."');</script>";
		
		}
	}else{

		foreach ($_POST as $key => $value) {
			$data[$key] = $value;
		}

		require './classes/FileUploader.php';
		require './classes/Cancion.php';

		$uri = FileUploader::subir("sound",AUDIOS,true,"mp3",$data['titulo']);
		$albumCover = FileUploader::subir("albumCover",IMAGENES,true,"jpg",$data['titulo']."AlbumCover");

		$miCancion = new Cancion($data['titulo'],$data['artista'],$data['genero'],$uri,$data['album'],$albumCover);

		$_POST = [];
		header('location: '.URL."?succes=1");

	}
?>