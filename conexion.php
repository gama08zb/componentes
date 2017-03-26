<?php
	
	class Conexion 
	{
		private $conect;
		private $codigo;
		private $nombre;
		private $slot;
		private $casa;
		private $codigoTag;
		private $id_casa;
		private $tags;
		function __construct()
		{
			$this->conect = new mysqli("localhost", "root", "", "component");
			/* verificar conexión */
			if (mysqli_connect_errno()) {
    			printf("Connect failed: %s\n", mysqli_connect_error());
    			exit();
			}
		}
		
		/* retorna una conexion conexión */
		public function getConexion(){
			return $this->conect;
		}
		/* cerrar conexión */
		public function cerrarConexion(){
			mysqli_close($this->conect);
		}

		public function llenarComponentesRecientes(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT co.`id`, co.`nombre`, co.`slot`, co.`id_casa`, ca.nombre as 										nombre_casa FROM `componentes` co
												INNER JOIN `casa` ca
												ON (co.`id_casa`=ca.id)")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		public function editComponent($codigo,$nombre, $slot, $id_casa,$tags){
			$this->codigo=(int)$codigo;
			$this->nombre=$nombre;
			$this->slot=(int)$slot;
			$this->id_casa=(int)$id_casa;
			$this->tags=$tags;
			try { 
				$this->conect->begin_transaction();
				if ($stmt = $this->conect->prepare("UPDATE `componentes` SET `nombre`=?,`slot`=?,`id_casa`=? WHERE `id`=?")) {
					$stmt->bind_param('sisi',$this->nombre,$this->slot,$this->id_casa,$this->codigo);
	    			/* ejecutar la consulta */
	    			$stmt->execute();
	   			}
	   			if ($stmt = $this->conect->prepare("DELETE FROM `tag_componentes` WHERE id_componentes=?")) {
					$stmt->bind_param('i',$codigo);
	    			/* ejecutar la consulta */
	    			$stmt->execute();
	   			}

	   			foreach ( $tags as &$value ){
	   				$value=(int)$value;
					if ($stmt = $this->conect->prepare("INSERT INTO tag_componentes values (?, ?)")) {
					$stmt->bind_param('ii',$codigo,$value);
	    			/* ejecutar la consulta */
	    			$stmt->execute();
	   				}
	   			}
				$this->conect->commit();
	   		} catch(PDOExecption $e) { 
        		$this->conect->rollback(); 
        		print "Error!: " . $e->getMessage() . "</br>"; 
			} catch( PDOExecption $e ) { 
			    print "Error!: " . $e->getMessage() . "</br>"; 
			} 
   			
		}

		public function llenarComponentes(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT `id`, `nombre`, `slot`, `casa` FROM `componentes`")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}
		public function llenarCasa(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT `id`, `nombre` FROM `casa`")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		public function llenarTags(){
			/* crear una sentencia preparada */
			if ($stmt = $this->conect->prepare("SELECT `id`, `nombre` FROM `tag`")) {

    			/* ejecutar la consulta */
    			$stmt->execute();
   				return $stmt->get_result();
   			}
   			return null;
		}

		public function addComponent($nombre,$slot, $id_casa,$tags){
			$this->nombre=$nombre;
			$this->slot=(int)$slot;
			$this->id_casa=(int)$id_casa;
			$this->tags=$tags;
			$this->slot=(int)$slot;
			try { 
				$this->conect->begin_transaction();
				if ($stmt = $this->conect->prepare("INSERT INTO `componentes`(`nombre`, `slot`, `id_casa`) VALUES (?,?,?)")) {
					$stmt->bind_param('sii',$this->nombre,$this->slot,$this->id_casa);
	    			/* ejecutar la consulta */
	    			$stmt->execute();
	   			}
	   			if ($stmt = $this->conect->prepare("SELECT MAX(id) as id FROM `componentes`")) {
	    			/* ejecutar la consulta */
	    			$stmt->execute();
	   				$result= $stmt->get_result();
	   				$lastId=$result->fetch_assoc();
   				}
	   			foreach ( $tags as &$value ){
	   				$value=(int)$value;
					if ($stmt = $this->conect->prepare("INSERT INTO tag_componentes values (?, ?)")) {
					$stmt->bind_param('ii',$lastId['id'],$value);
	    			/* ejecutar la consulta */
	    			$stmt->execute();
	   				}
	   			}
				$this->conect->commit();
	   		} catch(PDOExecption $e) { 
        		$this->conect->rollback(); 
        		print "Error!: " . $e->getMessage() . "</br>"; 
			} catch( PDOExecption $e ) { 
			    print "Error!: " . $e->getMessage() . "</br>"; 
			} 

		}

		public function deleteComponent($txtcodigocomponent){
			$this->codigo=(int)$txtcodigocomponent;
			try { 
				$this->conect->begin_transaction();

				if ($stmt = $this->conect->prepare("DELETE FROM `tag_componentes` WHERE id_componentes=?")) {
					$stmt->bind_param('i',$this->codigo);
	    			/* ejecutar la consulta */
	    			$stmt->execute();
	   			}
	   			if ($stmt = $this->conect->prepare("DELETE FROM `componentes` WHERE id=?")) {
					$stmt->bind_param('i',$this->codigo);
	    			/* ejecutar la consulta */
	    			$stmt->execute();
	   			}
	   			$this->conect->commit();
	   		} catch(PDOExecption $e) { 
        		$this->conect->rollback(); 
        		print "Error!: " . $e->getMessage() . "</br>"; 
			} catch( PDOExecption $e ) { 
			    print "Error!: " . $e->getMessage() . "</br>"; 
			} 
		}
	}
?>