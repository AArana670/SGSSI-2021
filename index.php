<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <title>MONKEISLAND-PÁGINA PRINCIPAL</title>
  <link rel="stylesheet" href="styleHacerseSocio.css">
  <script src="scriptHacerseSocio.js"></script>
</head>
<body>
 <header>
  <div>
  <img src="https://see.fontimg.com/api/renderfont4/M72w/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjRkVGRUZFIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/bW9ua2UgaXNhbG5k/hanalei-fill.png"></a>
	</div>
	<nav>
		<ul>
			<li><a href="index.php">Página principal</a></li>
			<li><a href="mostrarMonkes.php">Nuestros primates</a></li>
			<?php if (isset($_SESSION['usrDni'])){?>
				<li><a href="cambiarSocio.php?i=<?php echo $_SESSION["usrDni"];?>"></a><?php echo $_SESSION["usrName"];?></li>
			<?php }else{ ?>
				<li><a href="hsocio.php">Hazte socio</a></li>
				<li><a href="login.php">Iniciar sesión</a></li>
			<?php } ?>
		</ul>
	</nav>
</header>

<h1>Bienvenido a la pagina oficial de MONKE ISLAND</h1>
<br>
<br>
<h4>Bienvenido a la pagina oficial de MONKE ISLAND. MONKE ISLAND, desde el año 2003, es una organizacion internacional sin animo de lucro que se especifica en el cuidado de los primates que, por ejemplo, tienen alguna enfermedad o heridas que necesitan ser cuidadas o cuya raza esta en peligro de extincion. También nos ocupamos de rescatar los primates, encontrar a los maltratadores y de denunciarles juridicamente.</h4>
<br>
<br>
<img src="https://media-cdn.tripadvisor.com/media/photo-s/05/a2/20/1f/la-isla-de-los-monos.jpg"></a>
<br>
<br>
<h4>En nuestra pagina web puedes comprobar que primates se encuentran actualmente con nostoros y hacerte nuestro socio. AL ser socio, recibiras por correo noticias sobre nuestros refugios y el estado de los animales. También tendras la posibilidad de donar fondos, ya sea para mejorar las instalaciones o para  mejorar la calidad de vida de nuestros huespedes.</h4>
<br>
<br>
<img src="https://static.dw.com/image/19269554_303.jpg"></a>


</body>
</html>

