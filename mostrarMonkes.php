<?php
	session_start();
	$con = mysqli_connect("db","monkeyDirector","fVNsjkNwyrtL0yqq","database");
	if(!$con){
    		die("La conexión ha fallado: " . mysqli_connect_error());
    	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MONKEISLAND-MOSTRAR MONKES</title>
 	<link rel="stylesheet" href="style.css">
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
	<table><!--Creación de la primera fila de la tabla que contiene los valores de los campos que se van a mostrar-->
		<tr>
			<td>Nombre</td>
			<td>Raza</td>
		</tr>
		
		<?php   //consulta a la base de datos para obtener los datos de los primates 
			$consulta="SELECT MONKID,NOMBRE,RAZA FROM MONKE";
   			$resultado=mysqli_query($con, $consulta);		 
   		 	while($mostrar=mysqli_fetch_array($resultado)){
		?>
		
		<tr>
			<!--Hiperlink para cambiar los datos del primate seleccionado-->
			<td><a class ="links" href="cambiarMonke.php?i=<?php echo $mostrar["MONKID"]?>"><?php echo $mostrar["NOMBRE"]?></a></td>
			<td><?php echo $mostrar['RAZA']?></td>
		</tr>
		
		<?php
		}
		?>
		
	</table>
	<br><!--Hiperlink para añadir un primate-->
	<h1>¿Falta algún primates? <a class ="links" href="addMonke.php">Añádelo</a></h1>
	<br><!--Hiperlink para eliminar un primate-->
	<h1><a class ="links" href="eliminarMonke.php">Eliminar primates</a></h1>
</body>
</html>
