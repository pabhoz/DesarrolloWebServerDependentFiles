<?php
print_r($_FILES); //Es de tipo Array
$files = sizeof($_FILES);

for ($i=0; $i < $files ; $i++) { 

	if ($_FILES["file".$i]["error"] == 0)
	  {
	  	$uploads_dir = './img';
	  	$tmp_name = $_FILES["file".$i]["tmp_name"];
		$name = $_FILES["file".$i]["name"];
		move_uploaded_file($tmp_name, "$uploads_dir/$name");
	  }
	else
	  {
	  	echo "Error: " . $_FILES["file".$i]["error"] . "<br>";
	  }

}
?>