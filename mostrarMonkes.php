<?php

    $con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <title>MONKEISLAND-HACERSE SOCIO</title>
  <link rel="stylesheet" href="styleHacerseSocio.css">
</head>
<body>
 <header>
  <div>
  <img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
	</div>
	<nav>
		<ul>
			<li><a href="#">Página principal</a></li>
			<li><a href="#">Nuestros monkes</a></li>
			<li><a href="#">Hazte socio</a></li>
		</ul>
	</nav>
</header>

<h1>	Monos de nuestro zoo </h1>
	<table>
		<tr>
			<td>Nombre</td>
			<td>Raza</td>
		</tr>
		
		<?php
		$consulta="SELECT `NOMBRE`,`RAZA` FROM MONKE";
   		$resultado=mysqli_query($con, $consulta);
   		 
   		 while($mostrar=mysqli_fetch_array($resultado)){
		?>
		
		<tr>
			<td><?php echo $mostrar['NOMBRE']?></td>
			<td><?php echo $mostrar['RAZA']?></td>
		</tr>
		
		<?php
		}
		?>
		
	</table>
<br>
<br>

</body>
</html>
