<?php
session_start();
  if(!isset($_SESSION["usuario"])){
      header("location:../../index.php");
  }

if (!isset($_POST['partida'])) {
    header("location:../../index.php");
  }

include('../connection/conect.php');
  $paginaActual = $_POST['partida'];
    $nroUsuarios = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM usuario"));
    $nroLotes = 10;
    $nroPaginas = ceil($nroUsuarios/$nroLotes);
    $Anterior='';
    $Siguiente='';
    $lista = '';
    $tabla = '';
    $detalle ='<li class="active"><a>Pagina '.$paginaActual.' de '.$nroPaginas.'</a></li>';

    if($paginaActual > 1){
        $Anterior = $Anterior.'<li><a style="cursor:pointer;" onclick="pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    

    for($i=1; $i<= $nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a style="cursor:pointer;" onclick="pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a style="cursor:pointer;" onclick="pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $Siguiente = $Siguiente.'<li><a style="cursor:pointer;" onclick="pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}

  	$registro = mysqli_query($conexion, "SELECT * FROM usuario ORDER BY id_usuario DESC LIMIT $limit, $nroLotes");


  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-bordered">
                      <tr>
                      <th scope="col">Nombres</th>
                      <th scope="col">Apellidos</th>
                      <th scope="col">Sexo</th>
                      <th scope="col">Telefono</th>
                      <th scope="col">Correo</th>
                      <th scope="col">Usuario</th>
                      <th scope="col">Direccion</th>
                      <th scope="col">Descripcion</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Estado</th>
                      <th scope="col">Fecha de resgistro</th>
                      <th scope="col" colspan="2">Acciones</th>
                        </tr>';

	while($registro2 = mysqli_fetch_array($registro)){
    $editar = '<button title="Editar" onClick="javascript:editarUsuario('.$registro2['id_usuario'].');" class="btn btn-warning btn-xs">Editar</button>';

    $eliminar = '<button title="Eliminar" onClick="javascript:eliminarUsuario('.$registro2['id_usuario'].');" class="btn btn-danger btn-xs">Eliminar</button>';

    if ($registro2['estado']=='1') {
      $estado = 'Activo';
    }else{
      $estado = 'Desactivado';
    }

		$tabla = $tabla.'<tr>
                        <td>'.$registro2['nombres'].'</td>
                        <td>'.$registro2['apellidos'].'</td>
                        <td>'.$registro2['sexo'].'</td>
                        <td>'.$registro2['telefono'].'</td>
                        <td>'.$registro2['correo'].'</td>
                        <td>'.$registro2['usuario'].'</td>
                        <td>'.$registro2['direccion'].'</td>
                        <td>'.$registro2['descripcion'].'</td>
                        <td>'.$registro2['tipo'].'</td>
                        <td><input id="'.$registro2['id_usuario'].'" onclick="activaDesactiva('.$registro2['id_usuario'].')" class="btn btn-warning btn-xs" type="button" name="boton" value="'.$estado.'"></td> 
                        <td>'.date('d/m/Y',strtotime($registro2['fecha_registro'])).'</td>
                        <td>'.$editar.'</td>
                        <td>'.$eliminar.'</td>
    </tr>';		
	}
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista, 2 => $detalle, 3 => $nroLotes, 4 => $nroUsuarios , 5 => $Anterior, 6 => $Siguiente);
    echo json_encode($array);
?>