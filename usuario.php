<?php 
	require_once("conexion.php");
	class Usuario{
		private $pw="";
		private $codigoUsuario=0;
		private $resultado;

		function __construct($codigoUsuario,$pw){
			$this->codigoUsuario=(int)$codigoUsuario;
			$this->pw=$pw;
		}
		

		public function autenticar(){
			$conexion= new Conexion();
			$mysqli= $conexion->getConexion();
			if (mysqli_connect_errno()) {
    			printf("Connect failed: %s\n", mysqli_connect_error());
    			exit();
			}

			if ($stmt = $mysqli->prepare("SELECT count(*) FROM usuarios WHERE id = ? AND pass = ? ")){
				$stmt->bind_param("is",$this->codigoUsuario,$this->pw);
				$stmt->execute();
				$stmt->bind_result($this->resultado);
				$stmt->fetch();
			}
		}

		
		//setter and getters
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario=$codigoUsuario;
		}	

		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}

		public function setPw($pw){
			$this->pw=$pw;
		}

		public function getPw(){
			return $this->pw;
		}

		public function getResultado(){
			return $this->resultado;
		}
	}
?>