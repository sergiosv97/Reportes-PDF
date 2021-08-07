<?php 
	$server = 'localhost';
	$user = 'unity';
	$pass = '1234';
	$bd = 'bdejemplopdf';

	$conexion = new mysqli($server, $user, $pass, $bd);
	if (mysqli_connect_errno()){
		echo 'no conectado', mysqli_connect_error();
		exit();
	}/*else{
		echo 'conectado a la base de datos';
	}*/
 ?>
