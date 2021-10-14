<?php

include("conexionBD.php");
	$dni="123456789";
	echo ("$dni");
	$nombre=trim($_POST['txtNomApell']);
	echo ("$nombre");
	$tel=trim($_POST['txtTel']);
	$fecha="2002-02-02 00:00:00";
	$email=trim($_POST['txtEmail']);
	$usuario=trim($_POST['txtUsuario']);
	$password=trim($_POST['txtContr']);
	//$consulta=INSERT INTO `USUARIO`(`DNI`, `NOMBRE`, `TEL`, `FECHANAC`, `EMAIL`, `USUARIO`, `PASSWORD`) VALUES ('$dni','$nombre','$tel','$fecha','$email','$usuario','$password');
	//s$resultado= mysqli_query($conexion,$consulta);

?>
