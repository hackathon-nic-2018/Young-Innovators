<?php
session_start();
  if(!isset($_SESSION["usuario"])){
      header("location:../../index.php");
  }

if (!isset($_POST['dato'])) {
    header("location:../../index.php");
  }

include('../conexion/conexion.php');

$dato = mysqli_real_escape_string($conexion, $_POST['dato']);

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro = mysqli_query($conexion, "SELECT * FROM cuenta WHERE nombres LIKE '%$dato%' OR apellidos LIKE '%$dato%' ORDER BY id_cuenta DESC LIMIT 0,10");

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover table-bordered">
        		<tr>
              <th scope="col">Nombres</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Fecha Nacimiento</th>
              <th scope="col">Sexo</th>
              <th scope="col">Lugar Nacimiento</th>
              <th scope="col">Correo</th>
              <th scope="col">Telefono</th>
              <th scope="col">Usuario</th>
              <th scope="col">Estado</th>
              <th scope="col">Tipo</th>
              <th scope="col">Fecha Registro</th>
              <th scope="col" colspan="2">Acciones</th>
    			</tr>';
if(mysqli_num_rows($registro)>0){
            while($registro2 = mysqli_fetch_array($registro)){
              echo '<tr>
                        <td>'.$registro2['nombres'].'</td>
                        <td>'.$registro2['apellidos'].'</td>
                        <td>'.date('d/m/Y',strtotime($registro2['fecha_nacimiento'])).'</td>
                        <td>'.$registro2['sexo'].'</td>
                        <td>'.$registro2['lugar_nacimiento'].'</td>
                        <td>'.$registro2['correo'].'</td>
                        <td>'.$registro2['telefono'].'</td>
                        <td>'.$registro2['usuario'].'</td>
                        <td><input id="'.$registro2['id_cuenta'].'" onclick="activaDesactiva('.$registro2['id_cuenta'].')" class="btn btn-warning btn-xs" type="button" name="boton" value="'.$registro2['estado'].'"></td>
                        <td>'.$registro2['tipo'].'</td>
                        <td>'.date('d/m/Y',strtotime($registro2['fecha'])).'</td>
                        <td><button title="Editar" onClick="javascript:editarUsuario('.$registro2['id_cuenta'].');" class="btn btn-warning btn-xs">Editar</button></td> 
                        <td><button title="Eliminar" onClick="javascript:eliminarUsuario('.$registro2['id_cuenta'].');" class="btn btn-danger btn-xs">Eliminar</button></td>
                    </tr>';       
            }
}else{
	echo '<tr>
				<td colspan="13">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>