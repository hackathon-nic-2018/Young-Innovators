<?php
session_start();
  if(!isset($_SESSION["usuario"])){
      header("location:../../index.php");
  }

  if (!isset($_POST['id'])) {
    header("location:../../index.php");
  }

include('../conexion/conexion.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion, "SELECT * FROM cuenta WHERE id_cuenta = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombres'], 
				1 => $valores2['apellidos'],
				2 => $valores2['fecha_nacimiento'],
				3 => $valores2['sexo'],
				4 => $valores2['lugar_nacimiento'],
				5 => $valores2['correo'],
				6 => $valores2['telefono'],
				7 => $valores2['usuario'], 
				8 => $valores2['estado'],
				9 => $valores2['tipo'],
				);
echo json_encode($datos);

?>