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
	<title>Monke Island-Cambiar Datos De Monke</title>
	  <link rel="stylesheet" href="styleHacerseSocio.css">
	<script src="cambiarMonke.js"></script>
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
		<h4><a href="mostrarMonkes.php">Volver a la lista de monkes</a></h4>
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
		$consulta="SELECT MONKID, NOMBRE, RAZA, SEXO, PELIGRO FROM MONKE WHERE MONKID='$id'";
   		$resultado=mysqli_query($con, $consulta);
   		 }
   		while($mostrar=mysqli_fetch_array($resultado)){
		?>
		<tr>
			<td><?php echo $mostrar['NOMBRE']?></td>
			<td><?php echo $mostrar['RAZA']?></td>
			<td><?php echo $mostrar['SEXO']?></td>
			<td><?php echo $mostrar['PELIGRO']?></td>
		</tr>
		
		<?php
		}
		?>
		
	</table>
	

	<br>

	<h1 class="titulo">
		<?php
			if (isset($_GET['i'])){
				echo "Datos del monke $id";
			}else{
				echo "Introduce un monke que editar";
			}
		?></h1>
	<div id="avisos">
		
	</div>
	<form method="post">
		
		<h4>nombre</h4>
		<input type="text" id="txtNom" name="txtNom" value="<?php
			//if (isset($_GET['i'])){
			//	echo "$nombre";
			//}
		?>"
		>
		<h4>raza</h4>
		<input type="text" id="txtRaza" name="txtRaza">
		<h4>sexo</h4>
		<select name="sexo" id="drpSexo">
			<option value="M">M</option>
			<option value="H">H</option>
		</select>
		<h4>¿es peligroso?</h4>
		<select name="peligro" id="drpPeligro">
			<option value="1">Sí</option>
			<option value="0">No</option>
		</select>
		<br>
		<br>
		<input type="submit" onclick="limpiar()" name="cambio" id="btnAddMonke" value="Guardar cambios">
	</form>

<?php

if(isset($_POST['cambio'])&&isset($_POST['txtNom'])&&isset($_POST['txtRaza'])&&isset($_GET['i'])) {
	$id=$_GET['i'];
	$nombre=$_POST['txtNom'];
	$raza=$_POST['txtRaza'];
	$sexo=$_POST['sexo'];
	$peligro=$_POST['peligro'];
	$con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
	$consulta="UPDATE MONKE SET NOMBRE='$nombre', RAZA='$raza', SEXO='$sexo', PELIGRO='$peligro' WHERE MONKID='$id'";
	$resultado=mysqli_query($con, $consulta);
	mysqli_close($con);
	header("Refresh:0");
}
?>

</body>
</html>
