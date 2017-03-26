<?php 
session_start();
include 'conexion.php';

if(isset($_SESSION['user'])) {
	$conexion= new Conexion();
    $conexion->addComponent($_POST ["txtnombre"], $_POST ["txtslot"], $_POST ["cbxcasa"],$_POST ["listTag"] );
    $conexion->cerrarConexion();
    echo '<script> alert("Insertado con exito"); </script>';
    echo '<script> window.location="dashboard.php"; </script>';
  }
 ?>