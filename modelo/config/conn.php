<?php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "SomosCampeones";

	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	$conn -> set_charset("utf8");
   	if ($conn->connect_error) { die("Conexion fallida: " . $conn->connect_error); }
    else{ return $conn; }
?>