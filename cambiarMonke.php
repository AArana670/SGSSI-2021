<?php

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
	<link rel="stylesheet" href="./styleAddMonke.css">
	<script src="buscaMonke.js"></script>
</head>
<body>
	<header>
		<div>
			<img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
		</div>
		<nav>
		<ul>
			<li><a href="paginaPrincipal.html">Página principal</a></li>
			<li><a href="mostrarMonkes.php">Nuestros monkes</a></li>
			<li><a href="hsocio.php">Hazte socio</a></li>
			<li><a href="login.php">Iniciar sesión</a></li>
		</ul>
	</nav>
	</header>
	
	<?php
		if (isset($_GET["i"])){
			$id = $_GET["i"];
			$consulta="SELECT MONKID, NOMBRE, RAZA, SEXO, PELIGRO FROM MONKE WHERE MONKID=$id";
   			$resultado=mysqli_query($con, $consulta);
			/*while($datos=mysqli_fetch_array($resultado)){
				$nombre=$resultado['NOMBRE'];
				$raza=$resultado['RAZA'];
				$sexo=$resultado['SEXO'];
				$peligro=$resultado['PELIGRO'];

			}*/
			mysqli_close($con); 
		}
	?>

	<h4>Id del monke</h4>
	<input type="text" id="txtId">
	<button onclick="buscaMonke()" id="btnBuscar">Buscar</button>

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
		<input type="text" id="txtNom" name="txtNom" value="
		<?php
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
			<option value="si">Sí</option>
			<option value="no">No</option>
		</select>
		<br>
		<br>
		<input type="submit" name="cambio" id="btnAddMonke">Guardar cambios</input>
		
	</form>

<?php

if(isset($_POST['cambio'])&&isset($_POST['txtNom'])&&isset($_POST['txtRaza'])&&isset($_GET['i'])) {
	$id=$_GET['i'];
	$nombre=$_POST['txtNom'];
	$raza=$_POST['txtRaza'];
	$sexo=$_POST['sexo'];
	if($_POST['peligro']=='Sí'){
		$peligro=1;
	}
	else{
		$peligro=0;
	}
	$con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
	$consulta="UPDATE MONKE SET NOMBRE='$nombre', RAZA='$raza', SEXO='$sexo', PELIGRO='$peligro' WHERE MONKID='$id'";
	mysqli_close($con); 

}else{
	echo "oe pto ponelo todo";
}
?>

</body>
</html>