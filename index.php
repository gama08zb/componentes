<?php
	session_start();
	include 'conexion.php';
	if(isset($_SESSION['user'])){
		echo '<script> window.location="logout.php"; </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login.</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<div class="formulario rounded_border">
				<form action="validacion.php" method="post">
					<h1>Bienvenidos</h1>
					<div class="form-group">
						<input type="text" id="user" name="user" placeholder="Usuario">
					</div>
					<div class="form-group">
						<input type="password" id="pw" name="pw" placeholder="Contraseña">
					</div>
					<div class="form-group">
						<input type="submit" name="enviar" value="Aceptar">
					</div>
					<div class="form-group">
						<a href="dashboard.php">Entrar como Invitado</a><br>
						
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

	
</body>
</html>