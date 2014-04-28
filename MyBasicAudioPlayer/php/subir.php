<?php
	require 'connect.php';

	/**
	Subida del audio
	*/

		if ($_FILES["sound"]["error"] == 0)
		  {
		  	$uploads_dir = '../audios';
		  	$tmp_name = $_FILES["sound"]["tmp_name"];
			$name = $_FILES["sound"]["name"];
			move_uploaded_file($tmp_name, "$uploads_dir/$name");
			$fileUri = "./audios/$name";
		  }
		else
		  {
		  	echo "Error: " . $_FILES["sound"]["error"] . "<br>";
		  }

	/**
	INSERT
	*/
	
	$insert = "INSERT INTO audios (id,title,artist,genre,uri)
	VALUES ('','".$_POST["title"]."','".$_POST["artist"]."','".$_POST["genre"]."','".$fileUri."')";

	echo $insert;

	if(mysql_query($insert)){
		echo "pa'l rancho parceros";
	}else{
		echo "paila";
	}
?>