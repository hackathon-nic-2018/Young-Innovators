<?php
session_start();

if (!isset($_SESSION['user'])) {
	header('Location:../../index.php');
}

$conect = mysqli_connect('localhst', 'root', '', 'tesorocaribe') or die(mysqli_error('Error en la base de datos'));




?>