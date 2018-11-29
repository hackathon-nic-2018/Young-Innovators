<?php
 session_start();
 /*if (!isset($_SESSION['user'])) {
 	header('Location:../../index.php');
 }*/

/*se capturan y validan los datos enviados desde el login*/
 $user = mysqli_real_escape_string($conect, $_POST['user']);
 $pass = mysqli_real_escape_string($conect, $_POST['pass']);

 $array = [0 => $user, 1 => $pass];

 echo json_encode($array);

?>