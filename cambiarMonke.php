<?php 
    session_start();
    $con = mysqli_connect("db","admin","test","database");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
	}
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Monke Island-Cambiar Datos De Primate</title>
	<link rel="stylesheet" href="style.css">
	<script src="cambiarMonke.js"></script>
	<link rel="icon" type="image/png" href="/favicon.png"/>
  	<link rel="icon" type="image/png" href="https://favicon-generator.org/favicon-generator/htdocs/favicons/2012-10-18/11028c7d3531cb369e8128ace155a556.ico"/>
</head>
<body>
	<header>
		<div>
			<img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkZGQ0ZDIiwiYmdjIjoiI0Y0RjNGMyIsInQiOjF9/bW9ua2UgaXNsYW5k/hanalei-fill.png"></a>
		</div>
		<nav>
			<ul>
				<li><a href="index.php">Página principal</a></li>
				<li><a href="mostrarMonkes.php">Nuestros primates</a></li>
				<li><a href="hsocio.php">Hazte socio</a></li>
				<li><a href="login.php">Iniciar sesión</a></li>
			</ul>
		</nav>
	</header>
	
		<img class="tituloPrin" src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjozNSwidyI6MTAwMCwiZnMiOjM1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/UHJpbWF0ZXMgZGUgbnVlc3RybyByZWZ1Z2lv/hanalei-fill.png"></a>
	<br>
	<h1><a class ="links" href="mostrarMonkes.php">Volver a la lista de primates</a></h1>
	<br>
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
				echo "Datos del primate $id";
			}else{
				echo "Introduce un primate que editar";
			}
		?></h1>
	<div class="aviso" id="avisos"<h1></h1></div>
	<br>
	<form method="post">
		<h4>Nombre</h4>
		<input type="text" id="txtNom" name="txtNom">
		<h4>Raza</h4>
		<input type="text" id="txtRaza" name="txtRaza">
		<h4>Sexo</h4>
		<select name="sexo" id="drpSexo">
			<option value="M">Macho</option>
			<option value="H">Hembra</option>
		</select>
		<h4>¿Es peligroso?</h4>
		<select name="peligro" id="drpPeligro">
			<option value="1">Sí</option>
			<option value="0">No</option>
		</select>
		<br>
		<br>
		<div id="confirmar">
			<button class="btnGuardar" type="button" onclick="validar()" name="cambio" id="btnCambiar">Guardar cambios</button>
		</div>
	</form>

<?php

	if(isset($_POST['btnYes'])) {
		$id=$_GET['i'];
		$nombre=$_POST['txtNom'];
		$raza=$_POST['txtRaza'];
		if(!empty($nombre)&&!empty($raza)){
			$sexo=$_POST['sexo'];
			$peligro=$_POST['peligro'];
			$con = mysqli_connect("db","admin","test","database");
   			if(!$con){
    				die("La conexión ha fallado: " . mysqli_connect_error());
    			}	
    		
			$consulta="UPDATE MONKE SET NOMBRE='$nombre', RAZA='$raza', SEXO='$sexo', PELIGRO='$peligro' WHERE MONKID='$id'";
			$resultado=mysqli_query($con, $consulta);
			mysqli_close($con);
		
			echo"<html>";
    			echo "<br>";
    			echo"<h1> Datos del primate actualizados";
    			echo "<br>";
    			echo"</html>";

		}
	
	}
?>

</body>
</html>
