
<?php
	session_start();
	$con = mysqli_connect("localhost","admin","password","MONKEISLAND");
	if(!$con){
		die("La conexión ha fallado: " . mysqli_connect_error());
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Monke Island-Modificar datos personales</title>
	  <link rel="stylesheet" href="styleHacerseSocio.css">
</head>
<body>
	<header>
		<div>
			<img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
		</div>
		<nav>
		<ul>
			<li><a href="index.php">Página principal</a></li>
			<li><a href="mostrarMonkes.php">Nuestros monkes</a></li>
			<?php if (isset($_SESSION['usrDni'])){?>
				<li><a href="cambiarSocio.php?i=<?php echo $_SESSION["usrDni"];?>"></a><?php echo $_SESSION["usrName"];?></li>
			<?php }else{ ?>
				<li><a href="hsocio.php">Hazte socio</a></li>
				<li><a href="login.php">Iniciar sesión</a></li>
			<?php } ?>
		</ul>
	</nav>
	</header>
	
	<table>
		<tr>
			<td>Nombre</td>
			<td>Raza</td>
			<td>Sexo</td>
			<td>Peligro</td>
		</tr>
		
		<?php
		if (isset($_GET["i"])){
			$id = $_GET["i"];
		$consulta="SELECT DNI, NOMBRE, TELEFONO, FECHANAC, EMAIL, USUARIO, CONTRASENA FROM SOCIO WHERE DNI='$id'";
   		$resultado=mysqli_query($con, $consulta);
   		 }
   		 while($mostrar=mysqli_fetch_array($resultado)){
		?>
		<tr>
			<td><?php echo $mostrar['NOMBRE']?></td>
			<td><?php echo $mostrar['TELEFONO']?></td>
			<td><?php echo $mostrar['FECHANAC']?></td>
			<td><?php echo $mostrar['EMAIL']?></td>
			<td><?php echo $mostrar['USUARIO']?></td>
			<td><?php echo $mostrar['CONTRASENA']?></td>
		</tr>
		
		<?php
		}
		?>
		
	</table>
	

	<br>

	<h1 class="titulo">
		<?php
			if (isset($_GET['i'])){
				echo "Datos personales";
			}else{
				echo "Inicia sesión para poder modificar los datos personales";
			}
		?></h1>
	<div id="avisos">
		
	</div>
	<form method="post">
		
		<h4>nombre</h4>
		<input type="text" id="txtNom" name="txtNom" value="
		<?php
			//if (isset($_GET['i'])){
			//	echo "$nombre";
			//}
		?>"
		>
		<h4>teléfono</h4>
		<input type="text" id="txtTel" name="txtTel">
		<h4>email</h4>
		<input type="text" id="txtMail" name="txtMail">
		<h4>nombre de usuario</h4>
		<input type="text" id="txtUsr" name="txtUsr">
		<h4>contraseña</h4>
		<input type="text" id="txtPass" name="txtPass">
		<br>
		<br>
		<input type="submit" name="cambio" id="btnAddSocio">Guardar cambios</input>
		<button name="cerrar" id="cerrar">Cerrar Sesión</button>
	</form>

<?php

if(isset($_POST['cambio'])&&isset($_POST['txtNom'])&&isset($_POST['txtTel'])&&isset($_POST['txtMail'])&&isset($_POST['txtUsr'])&&isset($_POST['txtPass'])) {
	$id=$_GET['i'];
	$nombre=$_POST['txtNom'];
	$tel=$_POST['txtTel'];
	$mail=$_POST['txtMail'];
	$usr=$_POST['txtUsr'];
	$pass=$_POST['txtPass'];
	$con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
	$consulta="UPDATE SOCIO SET NOMBRE='$nombre', TELEFONO='$tel', EMAIL='$mail', USUARIO='$usr', CONTRASENA='$pass' WHERE DNI='$id'";
	$resultado=mysqli_query($con, $consulta);
	mysqli_close($con);
	header("Refresh:0");
}else{
	if (isset($_POST['cerrar'])){
		session_destroy();
		header("Refresh:0");
	}
}
?>

</body>
</html>
