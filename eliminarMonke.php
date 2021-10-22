<?php session_start()?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Monke Island-Añadir Monke</title>
	<link rel="stylesheet" href="./styleAddMonke.css">
	<script src="borrarMonke.js"></script>
	
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
	
	<h1 class="titulo">Elimina un monke</h1>
	<br>
	<div id="avisos">

	</div>
	<br>
	<form method="POST">
	<h4>Introduce el id del monke que quieres eliminar</h4>
	<input type="text" id="txtMONKEID" name="txtMONKEID">
	<div id="confirmar">
		<button onclick="avisar()" id="btnDel">Borrar</button>
	</div>
	</form>

<?php

    $con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
	if (isset($_POST["btnYes"])&&isset($_POST["txtMONKEID"])){
		$idu=$_POST['txtMONKEID'];
		$consulta="DELETE FROM MONKE WHERE MONKID = '$idu'";
		mysqli_query($con, $consulta);
	}
    mysqli_close($con);
 
?>

</body>
</html>
