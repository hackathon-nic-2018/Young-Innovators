<?php
session_start();
  if(!isset($_SESSION["usuario"])){
      header("location:../../index.php");
  }

  if (!isset($_POST['id'])) {
    header("location:../../index.php");
  }

include('../connection/conect.php');

$id = $_POST['id'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores = mysqli_query($conexion, "SELECT * FROM usuario WHERE id_usuario = '$id'");
$valores2 = mysqli_fetch_array($valores);

$datos = array(
				0 => $valores2['nombres'], 
				1 => $valores2['apellidos'],
				2 => $valores2['sexo'],
				3 => $valores2['telefono'],
				4 => $valores2['correo'],
				5 => $valores2['usuario'],
				6 => $valores2['clave'],
				7 => $valores2['direccion'], 
				8 => $valores2['descripcion'],
				9 => $valores2['tipo'],
				10 => $valores2['estado'],
				11 => $valores2['imagen'],
				);
echo json_encode($datos);

?>