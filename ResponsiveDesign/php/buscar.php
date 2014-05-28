<?php
	require_once 'connect.php';

	$sel = "SELECT * FROM audios WHERE album = '$_POST[album]' AND artista = '$_POST[artista]'";
	$result = mysql_query($sel);
	while($row = mysql_fetch_assoc($result)){
		$response[] = $row;
	}
	//print_r($response);
	echo json_encode($response);
?>