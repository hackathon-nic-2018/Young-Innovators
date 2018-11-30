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
$error='';
if ($id==38) {
	$error= "<script>alertify.alert('Alerta!','No puedes eliminar el usuario de maximo nivel')</script>";
}else{
	mysqli_query($conexion, "DELETE FROM usuario WHERE id_usuario = '$id'");
}

include ('muestraResultadoUsuario.php');
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
$array = array(0 => $tab, 1 => $lista, 2 => $detalle, 3 => $nroLotes, 4 => $nroUsuarios, 5 => $error,6 => $Anterior, 7 => $Siguiente);
    echo json_encode($array);

?>