<?php
session_start();
  if(!isset($_SESSION["usuario"])){
      header("location:../../index.php");
  }

  if (!isset($_POST['actual'])) {
    header("location:../../index.php");
  }

include('../conexion/conexion.php');
$id = $_SESSION['id_cuenta'];
$dato1 = mysqli_real_escape_string($conexion, $_POST['actual']);
$cadena = '@Asd:-)!Axkdi%';
$actual = sha1($cadena.$dato1);
$dato2 = mysqli_real_escape_string($conexion, $_POST['nueva']);
$nueva = sha1($cadena.$dato2);
$confirmacion = mysqli_real_escape_string($conexion, $_POST['confirmacion']);

//Validacion formulario
$resultado = '';
$query = mysqli_query($conexion, "SELECT clave FROM cuenta WHERE id_cuenta= '$id'");
$dato = mysqli_fetch_array($query);
$claveActual = $dato['clave'];

if (empty($dato1) || empty($dato2) || empty($confirmacion)) {
	$resultado = "<script>$('.mensaje').addClass('ok').html('llenar todos los campos').show(200).delay(2500).hide(200);</script>";
	
}elseif ($claveActual != $actual) {
	$resultado = "<script>alertify.alert('Alerta!','La contraseña actual es incorrecta')</script>";
	
}elseif ($dato2 != $confirmacion) {
	$resultado = "<script>alertify.alert('Alerta!','Las contraseñas no coinciden')</script>";
}elseif (strlen($dato2)>12) {
	$resultado = "<script>alertify.alert('Alerta!','Las contraseñas no deben contener mas de 12 caracteres')</script>";

}else{ 
	mysqli_query($conexion, "UPDATE cuenta SET clave='$nueva' WHERE id_cuenta = '$id'");
	$resultado = "<script>$('.mensaje').addClass('bien').html('Tu contraseña se cambio correctamente').show(200).delay(2500).hide(200);</script>";

}

// Devolvemos resultado al ajax
$array = array(0 => $resultado);
echo json_encode($array);



?>