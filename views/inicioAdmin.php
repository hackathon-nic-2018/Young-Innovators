<?php
if (!isset($_SESSION['usuario']) && $_SESSION['tipo']!='Administrador') {
	header('location:../index.php');
}

include('../controllers/connection/conect.php');
          
?>
