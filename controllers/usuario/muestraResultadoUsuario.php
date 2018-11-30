<?php
$paginaActual = 1;
    $nroUsuarios = mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM cuenta"));
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

$registro = mysqli_query($conexion, "SELECT * FROM cuenta ORDER BY id_cuenta DESC LIMIT $limit,$nroLotes");
$tab='<table class="table table-striped table-condensed table-hover table-bordered">
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
            while($registro2 = mysqli_fetch_array($registro)){
               $tab=$tab.'<tr>
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
$tab=$tab.'</table>';
?>