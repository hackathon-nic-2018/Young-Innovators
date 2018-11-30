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
$error='';
if ($id==38) {
	$error= "<script>
	alertify.alert('Alerta!','No puedes desactivar usuario de maximo nivel');</script>";
}else{
$cans=mysqli_query($conexion, "SELECT * FROM cuenta WHERE estado='Activo' and id_cuenta='$id'");
if($dat=mysqli_fetch_array($cans)){
	mysqli_query($conexion, "UPDATE cuenta SET  estado = 'Desactivado' WHERE id_cuenta = '$id'");
}else{
	mysqli_query($conexion, "UPDATE cuenta SET  estado = 'Activo' WHERE id_cuenta = '$id'");
}
}

include ('muestraResultadoUsuario.php');
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
$array = array(0 => $tab, 1 => $lista, 2 => $detalle, 3 => $nroLotes, 4 => $nroUsuarios, 5 => $error,6 => $Anterior, 7 => $Siguiente);
    echo json_encode($array);

?>