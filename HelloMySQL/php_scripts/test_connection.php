<?php

$server = "localhost";
$user = "root";
$pass = "";

$errorMsg = "Canceleishon is the way";

$db_name = "sisas";
$selectDBError ="Canceleishon is THE WAAAAY, there is not that database";

$conexion = mysql_connect($server,$user,$pass) or die ($errorMsg);

               
if($conexion){
	echo "Yeah! connected to server";
	mysql_selectdb($db_name,$conexion) or die ($selectDBError);
}

?>
