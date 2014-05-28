<?php
	require 'connect.php';

	/**
	Subida de la imagen
	*/

		if ($_FILES["albumCover"]["error"] == 0)
		  {
		  	$uploads_dir = '../AlbumCovers';
		  	$tmp_name = $_FILES["albumCover"]["tmp_name"];
			$name = $_FILES["albumCover"]["name"];
			move_uploaded_file($tmp_name, "$uploads_dir/$name");
			$coverUri = "./AlbumCovers/$name";
		  }
		else
		  {
		  	echo "Error: " . $_FILES["albumCover"]["error"] . "<br>";
		  }

	/**
	Subida del audio
	*/

		if ($_FILES["sound"]["error"] == 0)
		  {
		  	$uploads_dir = '../audios';
		  	$tmp_name = $_FILES["sound"]["tmp_name"];
			$name = $_FILES["sound"]["name"];
			move_uploaded_file($tmp_name, "$uploads_dir/$name");
			$audioUri = "./audios/$name";
		  }
		else
		  {
		  	echo "Error: " . $_FILES["sound"]["error"] . "<br>";
		  }

	/**
	INSERT
	*/
	
	$insert = "INSERT INTO audios (id,titulo,artista,album,albumCover,genero,uri)
	VALUES ('','".$_POST["title"]."','".$_POST["artist"]."','".$_POST["album"]."','".$coverUri."','".$_POST["genre"]."','".$audioUri."')";

	echo $insert;

	if(mysql_query($insert)){
		echo "pa'l rancho parceros";
	}else{
		echo "paila";
	}
	/**
	Trampisha para cuando terminemos de shubiiiir
	*/

	echo '<script> alert("Subió!"); parent.location.reload(); </script>';
?>