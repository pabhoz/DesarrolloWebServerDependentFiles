<?php
	Class FileUploader{

		/*
			Metodos de la clase:

			subir | SubidaAvanzada
			verificarFormato
			verificarTamano
		*/

		/**
		* subir
		*
		* @author Pabhoz
		*
		* Sube un archivo al servidor y dado el caso en que el archivo se
		* suba de manera avanzada, se verifica la extensión del mismo.
		*
		* @param String  $file 		Nombre del input tipo file
		* @param String  $uploadDir Dirección en donde se alojará el archivo
		* @param Boolean $advanced 	Determina el tipo de subida de archivo
		* @param String  $ext 		Tipo de extensión ideal del archivo
		* 
		* @return String URI/Error 	Para casos exitosos retorna la URI del
		*							archivo, de lo contrario el error presentado
		*/
		static function subir($file,$uploadDir,$advanced = false, $ext = '',$finalName = ''){

			if($advanced){
				
				$filename = $_FILES[$file]['name'];

				if(FileUploader::verificarExt($filename,$ext)){

					if ($_FILES[$file]["error"] == 0)
					  {
					  	$uploads_dir = $uploadDir;
					  	$tmp_name = $_FILES[$file]["tmp_name"];
						$name = ($finalName == '') ? $_FILES[$file]["name"] : $finalName.".".$ext;
						move_uploaded_file($tmp_name, "$uploads_dir$name");
						return URL.$uploads_dir.$name;
					  }
					else
					  {
					  	return "Error: " . $_FILES[$file]["error"] . "<br>";
					  }

				}else{
					$_POST = [];
					header('location:'.URL."?succes=0");
				}

			}	
		}

		/**
		* verificarExt
		*
		* @author Pabhoz
		*
		* Verifica el tipo de archivo.
		*
		* @param String  $filename  	Nombre del input tipo file
		* @param String  $target    	Tipo de archivo deseado
			Turn it to an Array!
		* 
		* @return Boolean $response Verdedadero al coincidir
		*/
		static function verificarExt($filename, $target){

			$array = explode(".", $filename);
			$ext = end($array);
			return $response = ($ext == $target) ?  true : false;

		}
	}
?>