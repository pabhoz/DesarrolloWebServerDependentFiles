<?php
	class Cancion {

		function __construct($titulo,$artista,$genero,$uri,$album,$albumCover){

			$this->titulo = $titulo;
			$this->artista = $artista;
			$this->genero = $genero;
			$this->uri = $uri;
			$this->album = $album;
			$this->albumCover = $albumCover;
		}

		public function foo(){
			return "Foo Method!";
		}

	}
?>