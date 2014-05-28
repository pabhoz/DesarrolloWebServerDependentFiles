<?php
	
	if($_POST["metodo"] && $_POST["parametros"]){
		//Metodo a ejecutar
		$metodo = $_POST["metodo"];
		//String de parametros separada por comas en el orden
		$parametros = $_POST["parametros"];

		if($metodo == "checkFile"){
			require './classes/FileUploader.php';

			$params = explode(",",$parametros);

			echo FileUploader::verificarExt($params[0],$params[1]);
		}

	}

?>