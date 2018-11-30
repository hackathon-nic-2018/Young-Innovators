<?php
session_start();
  if(!isset($_SESSION["usuario"])){
      header("location:../../index.php");
  }

  if (!isset($_POST['nombre'])) {
    header("location:../../index.php");
  }

include('../conexion/conexion.php');
$id = $_POST['id_cuenta'];
$dato1 = strtolower($_POST['nombre']);
$nombre=mysqli_real_escape_string($conexion, ucwords($dato1));
$dato2 = strtolower($_POST['apellido']);
$apellido = mysqli_real_escape_string($conexion, ucwords($dato2));
$fecha_naci = $_POST['fecha_naci'];
$sexo = $_POST['sexo'];
$lugar_naci = mysqli_real_escape_string($conexion, ucfirst($_POST['lugar_naci']));
$correo = mysqli_real_escape_string($conexion, $_POST['correo']);
$telefono =  mysqli_real_escape_string($conexion, $_POST['telefono']);
$usuario = mysqli_real_escape_string($conexion,  $_POST['usuario']);
$clave = mysqli_real_escape_string($conexion, $_POST['usuario']);
$tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);
$estado = mysqli_real_escape_string($conexion, $_POST['estado']);
$cadena = '@Asd:-)!Axkdi%';
$combinado = sha1($cadena.$clave);
$foto = 'defecto.jpg';

$error='';
if ($id==38) {
	$error= "<script>alertify.alert('Alerta!','No puedes Editar usuario de maximo nivel');</script>";

}elseif (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['fecha_naci']) || empty($_POST['usuario']) || empty($_POST['estado']) || empty($_POST['tipo'])) {
	$error= "<script>alertify.alert('Alerta!','Los campos nombres, apellidos, fecha_nacimiento,usuario,estado y tipo , son requeridos')</script>";

}elseif (strlen($nombre)>30){
	$error= "<script>alertify.alert('Alerta!','El campo nombres no debe contener una cadena mayor a 30 caracteres')</script>";
}elseif (strlen($apellido)>40) {
	$error= "<script>alertify.alert('Alerta!','El campo apellidos no debe contener una cadena mayor a 40 caracteres')</script>";

}elseif (strlen($lugar_naci)>50) {
	$error= "<script>alertify.alert('Alerta!','El campo lugar nacimiento no debe contener una cadena mayor a 50 caracteres')</script>";

}elseif (strlen($correo)>100) {
	$error= "<script>alertify.alert('Alerta!','El campo correo no debe contener una cadena mayor a 100 caracteres')</script>";

}elseif (strlen(trim($telefono))>8) {
	$error= "<script>alertify.alert('Alerta!','El campo telefono no debe contener un numero mayor de 8 digitos')</script>";
}elseif (strlen(trim($usuario))>12) {
	$error= "<script>alertify.alert('Alerta!','El campo usuario no debe ser mayor a 12 caracteres')</script>";
}
else{
	if (!empty($telefono)) {
	   if (!is_numeric($telefono)) {
		$error= "<script>alertify.alert('Alerta!','El campo telefono no debe contener letras')</script>";
	}else{
		mysqli_query($conexion, "UPDATE cuenta SET nombres = '$nombre', apellidos = '$apellido',fecha_nacimiento='$fecha_naci',sexo='$sexo',lugar_nacimiento='$lugar_naci',correo='$correo',telefono='$telefono', usuario = '$usuario', clave='$combinado', estado = '$estado',tipo = '$tipo' WHERE id_cuenta = '$id'");
	
	$error= "<script>$('.mensaje').addClass('bien').html('Edicion completado con exito').show(200).delay(2500).hide(200);</script>";
	}
}else{

	mysqli_query($conexion, "UPDATE cuenta SET nombres = '$nombre', apellidos = '$apellido',fecha_nacimiento='$fecha_naci',sexo='$sexo',lugar_nacimiento='$lugar_naci',correo='$correo',telefono='$telefono', usuario = '$usuario', clave='$combinado', estado = '$estado',tipo = '$tipo' WHERE id_cuenta = '$id'");
	
	$error= "<script>$('.mensaje').addClass('bien').html('Edicion completado con exito').show(200).delay(2500).hide(200);</script>";
}
}

	
include ('muestraResultadoUsuario.php');
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
$array = array(0 => $tab, 1 => $lista, 2 => $detalle, 3 => $nroLotes, 4 => $nroUsuarios, 5 => $error,6 => $Anterior, 7 => $Siguiente);
    echo json_encode($array);

?>