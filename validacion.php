<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			function encriptar($cadena){
			    $key='tarea';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
			    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
			    return $encrypted; //Devuelve el string encriptado
		 
			}
 
			function desencriptar($cadena){
			     $key='tarea';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
			     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
			    return $decrypted;  //Devuelve el string desencriptado
			}
			require_once( 'usuario.php');
			require_once( 'conexion.php');
			$conexion = new Conexion();
			if(isset($_POST['user'])){
				$usuario= new Usuario($_POST['user'],encriptar($_POST['pw']));
				$usuario->autenticar();
				echo '<script> alert($usuario->getResultado());</script>';
				if ($usuario->getResultado()==0) {
					echo '<script> alert("error en el usuario o contraseña");</script>';
					echo '<script> window.location="index.php"; </script>';
				} else{
					$_SESSION["user"] = $usuario->getCodigoUsuario();
					echo '<script> window.location="dashboard.php"; </script>';
				}
				
			}
		?>	
</body>
</html>