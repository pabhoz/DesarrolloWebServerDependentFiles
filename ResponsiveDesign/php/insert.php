<?php
	
	print_r($_POST);
	require "connect.php";

	$insert = "INSERT INTO usuarios (ID, USERNAME, PASSWORD, NOMBRE)
VALUES ('','".$_POST["username"]."','".$_POST["password"]."','".$_POST["nombre"]."')";

echo $insert;

	if(mysql_query($insert)){
		echo "pa'l rancho parceros";
	}else{
		echo "paila";
	}
?>