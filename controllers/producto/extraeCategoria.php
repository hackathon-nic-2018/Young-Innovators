<?php
session_start();
if (!isset($_SESSION['usuario'])) {
	header('location:../../index.php');
}

if (!isset($_POST['dato'])) {
	header('location:../../index.php');
}

include('../connection/conect.php');

	$dato = mysqli_real_escape_string($conexion, $_POST['dato']);

	$query = mysqli_query($conexion, "SELECT * FROM categoria WHERE nombre LIKE '%$dato%' LIMIT 0,10");

	echo '<table class="searchTable table-triped table-condensed table-hover">';

	if (mysqli_num_rows($query)>0) {
		while ($dt = mysqli_fetch_array($query)) {

		echo '
			<tr>
                <td>'.$dt['nombre'].'</td> 
                <td class="iconTd">
                <a class="btn btn-success btn-sm" onclick="pegaDatos('.$dt['id_categoria'].',\''.$dt['nombre'].'\')">
                  <i class="glyphicon glyphicon-arrow-right"></i>
                </a>
                </td>
            </tr>

		';
	}
	}else{
		echo '<tr>
				<td align="center" colspan="2"><b>No se encontraron resultados</b></td>
			</tr>';
	}

	echo '</table>';


?>