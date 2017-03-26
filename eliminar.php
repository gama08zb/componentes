<?php 
session_start();
include 'conexion.php';

if(isset($_SESSION['user'])) {
	$conexion= new Conexion();
    $conexion->deleteComponent($_GET['id_componentes']);
    $conexion->cerrarConexion();
    echo '<script> alert("eliminado con exito"); </script>';
    echo '<script> window.location="dashboard.php"; </script>';
  }
 ?>