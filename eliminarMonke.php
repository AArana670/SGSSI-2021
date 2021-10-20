<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Monke Island-Añadir Monke</title>
	<link rel="stylesheet" href="./styleAddMonke.css">
	
</head>
<body>
	<header>
  <div>
	  <img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
		</div>
		<nav>
			<ul>
				<li><a href="#">Página principal</a></li>
				<li><a href="mostrarMonkes.php">Nuestros monkes</a></li>
				<li><a href="hacerseSocio.php">Hazte socio</a></li>
			</ul>
		</nav>
	</header>
	
	<h1 class="titulo">Añade un monke</h1>
	<form method="POST">
	<h4>Introduce el id del monke que quieres eliminar</h4>
	<input type="text" id="txtMONKEID" name="txtMONKEID">
	<input type="submit" value="Borrar">
	</form>

<?php

    $con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
    $idu=$_POST['txtMONKEID'];
    echo "$idu";
    $consulta="DELETE FROM MONKE WHERE MONKID = '$idu'";
    mysqli_query($con, $consulta);
    mysqli_close($con);
 
?>

</body>
</html>
