<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <title>MONKEISLAND-LOGIN</title>
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
			<li><a href="paginaPrincipal.html">Página principal</a></li>
			<li><a href="mostrarMonkes.php">Nuestros monkes</a></li>
			<li><a href="hsocio.php">Hazte socio</a></li>
			<li><a href="login.php">Iniciar sesión</a></li>
		</ul>
	</nav>
</header>

<form method="post">
<input type="text" name="txtUsuarioLogin" id="txtUsuarioLogin">
<br>
<br>
<input type="text" name="txtContrLogin" id="txtContrLogin">
<br>
<br>
<button onclick="submit" id="btnLOGIN">Iniciar sesión</button>
</form>
<?php

    $con = mysqli_connect("localhost","admin","password","MONKEISLAND");
    if(!$con){
    	die("La conexión ha fallado: " . mysqli_connect_error());
    }
    $usuario=$_POST['txtUsuarioLogin'];
    $contrasena=$_POST['txtContrLogin'];
    session_start();
    $_SESSION['usuario']=$usuario;
    $consulta="SELECT * FROM SOCIO WHERE USUARIO='$usuario'AND CONTRASENA='$contrasena'" ;
    $resultado=mysqli_query($con, $consulta);
    $filas=mysqli_num_rows($resultado);
    if($filas){
    	echo "usuario y contraseña correctas";
    }else{  
    	echo "usuario o contraseña incorrectas";
    }
    mysqli_free_result($resultado);
    mysqli_close($con); 
?>

</body>
</html>

