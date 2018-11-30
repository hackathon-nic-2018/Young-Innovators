<?php
session_start();
$conexion = mysqli_connect('localhost','root','','tc');
if(isset($_POST["usuario"]) && isset($_POST["clave"])){
  $usuario = mysqli_real_escape_string($conexion, $_POST["usuario"]);
  $clave = mysqli_real_escape_string($conexion, $_POST["clave"]);
  $cadena = '@Asd:-)!Axkdi%';
  $combinado = sha1($cadena.$clave);
  $sql = "SELECT * FROM usuario WHERE (usuario='$usuario' OR correo='$usuario') AND clave='$combinado'";
  $result = mysqli_query($conexion, $sql);
  $num_row = mysqli_num_rows($result);
  $data = mysqli_fetch_array($result);
  if ($num_row == "1") {
    if ($data["estado"]=="1") {
  $_SESSION["id_usuario"] = $data["id_usuario"]; 
  $_SESSION["nombres"] = $data["nombres"];
  $_SESSION["apellidos"] = $data["apellidos"];
  $_SESSION["sexo"] = $data["sexo"];
  $_SESSION["telefono"] = $data["telefono"];
  $_SESSION["correo"] = $data["correo"];
  $_SESSION["usuario"] = $data["usuario"];
  $_SESSION["direccion"] = $data["direccion"];
  $_SESSION["descripcion"] = $data["descripcion"];
  $_SESSION["tipo"] = $data["tipo"];
  $_SESSION["estado"] = $data["estado"];
  $_SESSION["imagen"] = $data["imagen"];

 
    echo "1";
    }else{

         echo "0";
    }
  
  } else {
    echo "!1";
  }
} else {
  echo "error";
}

?>