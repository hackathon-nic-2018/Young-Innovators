<?php
 session_start();
 if (!isset($_SESSION['usuario'])) {
 	header('location:../index.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php include '../includes/titulo.php';?></title>
	<?php include_once '../includes/cssInside.php';?>
</head>
<body>
	<!--Cabezera y barra menu de navegacion-->
	<?php include_once '../includes/headerInside.php';?>


	<!--SideBar menu -->
	<?php include_once '../includes/sideBar.php';?>

	<!--Contenido de la pagina-->
	<div class="principal container-fluid fluid">
		<?php
			if ($_SESSION['tipo']=='Administrador') {
				include_once 'inicioAdmin.php';
			}

		?>
	</div>

	<!--Pie de pagina-->
	<?php include_once '../includes/footerInside.php';?>
	
	<?php include_once '../includes/jsInside.php';?>
</body>
</html>