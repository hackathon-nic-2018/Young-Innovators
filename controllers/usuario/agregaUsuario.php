<?php
session_start();
  if(!isset($_SESSION["usuario"])){
      header("location:../../index.php");
  }

  if (!isset($_POST['nombres'])) {
    header("location:../../index.php");
  }

include('../connection/conect.php');
$dato1 = strtolower($_POST['nombres']);
$nombres=mysqli_real_escape_string($conexion, ucwords($dato1));
$dato2 = strtolower($_POST['apellidos']);
$apellidos = mysqli_real_escape_string($conexion, ucwords($dato2));
$sexo = $_POST['sexo'];
$telefono =  mysqli_real_escape_string($conexion, $_POST['telefono']);
$correo = mysqli_real_escape_string($conexion, $_POST['correo']);
$usuario = mysqli_real_escape_string($conexion,  $_POST['usuario']);
$clave = '1234';
$direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
$descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
$tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);
$estado = mysqli_real_escape_string($conexion, $_POST['estado']);
$cadena = '@Asd:-)!Axkdi%';
$combinado = sha1($cadena.$clave);
$imagen = 'defecto.jpg';

$registro = mysqli_query($conexion, "SELECT usuario FROM usuario WHERE usuario='$usuario'");
$result= mysqli_num_rows($registro);
$error='';
if ($result==1) {
	$error= "<script>alertify.alert('Alerta!','El usuario que intentas registrar ya esta registrado')</script>";
	
}elseif (empty($_POST['nombres']) || empty($_POST['apellidos']) || empty($_POST['usuario'])) {
	$error= "<script>alertify.alert('Alerta!','Los campos nombres, apellidos, fecha_nacimiento,usuario,estado y tipo , son requeridos')</script>";

}elseif (strlen($nombres)>50){
	$error= "<script>alertify.alert('Alerta!','El campo nombres no debe contener una cadena mayor a 50 caracteres')</script>";
}elseif (strlen($apellidos)>50) {
	$error= "<script>alertify.alert('Alerta!','El campo apellidos no debe contener una cadena mayor a 50 caracteres')</script>";

}elseif (strlen($sexo)>1) {
	$error= "<script>alertify.alert('Alerta!','El campo sexo no debe contener una cadena mayor a 1 caracteres')</script>";

}elseif (strlen($telefono)>12) {
	$error= "<script>alertify.alert('Alerta!','El campo telefono no debe contener una cadena mayor a 12 digitos')</script>";

}elseif (strlen(trim($correo))>70) {
	$error= "<script>alertify.alert('Alerta!','El campo correo no debe contener un numero mayor de 70 caracteres')</script>";
}elseif (strlen(trim($usuario))>15) {
	$error= "<script>alertify.alert('Alerta!','El campo usuario no debe ser mayor a 15 caracteres')</script>";

}elseif (strlen(trim($clave))>255) {
    $error= "<script>alertify.alert('Alerta!','El campo clave no debe ser mayor a 255 caracteres')</script>";

}elseif (strlen(trim($direccion))>255) {
	$error= "<script>alertify.alert('Alerta!','El campo direccion no debe ser mayor a 255 caracteres')</script>";

}elseif (strlen(trim($descripcion))>255) {
	$error= "<script>alertify.alert('Alerta!','El campo descripcion no debe ser mayor a 255 caracteres')</script>";

}elseif (strlen(trim($tipo))>20) {
	$error= "<script>alertify.alert('Alerta!','El campo tipo no debe ser mayor a 20 caracteres')</script>";

}elseif (strlen(trim($estado))>1) {
	$error= "<script>alertify.alert('Alerta!','El campo estado no debe ser mayor a 1 caracteres')</script>";

}elseif (strlen(trim($imagen))>45) {
	$error= "<script>alertify.alert('Alerta!','El campo imagen no debe ser mayor a 45 caracteres')</script>";

}
else{
	if (!empty($telefono)) {
	if (!is_numeric($telefono)) {
		$error= "<script>alertify.alert('Alerta!','El campo telefono no debe contener letras')</script>";
	}else{
		mysqli_query($conexion, "INSERT INTO usuario (nombres, apellidos, sexo, telefono, correo, usuario, clave, direccion, descripcion, tipo, estado, imagen, fecha_registro)VALUES('$nombres','$apellidos','$sexo','$telefono','$correo','$usuario','$combinado','$direccion','$descripcion', '$tipo', '$estado', '$imagen', now())");
	$error= "<script>$('.mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);</script>";
	}
	
}else{
	mysqli_query($conexion, "INSERT INTO usuario (nombres, apellidos, sexo, telefono, correo, usuario, clave, direccion, descripcion, tipo, estado, imagen, fecha_registro)VALUES('$nombres','$apellidos','$sexo','$telefono','$correo','$usuario','$combinado','$direccion','$descripcion', '$tipo', '$estado', '$imagen', now())");
	$error= "<script>$('.mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);</script>";
}

}

include ('muestraResultadoUsuario.php');
//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
$array = array(0 => $tab, 1 => $lista, 2 => $detalle, 3 => $nroLotes, 4 => $nroUsuarios, 5 => $error,6 => $Anterior, 7 => $Siguiente);
    echo json_encode($array);

?>