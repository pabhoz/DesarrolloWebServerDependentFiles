<?php

$server = "localhost";
$user = "root";
$pass = "";

$errorMsg = "Canceleishon is the way";

$db_name = "audioplayer_app";
$selectDBError ="Canceleishon is THE WAAAAY, there is not that database";

$conexion = mysql_connect($server,$user,$pass) or die ($errorMsg);

               
if($conexion){
	mysql_selectdb($db_name,$conexion) or die ($selectDBError);
}

?>
