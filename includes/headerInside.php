<?php 
    include('../controllers/connection/conect.php');
    $registro = mysqli_query($conexion, "SELECT * FROM usuario WHERE id_usuario = $_SESSION[id_usuario]");
    $registro2 = mysqli_fetch_array($registro);
    $nombres = explode(' ', $registro2['nombres']);
    $apellidos = explode(' ', $registro2['apellidos']);
    
    $primerNom = $nombres[0];
    $primerApe = $apellidos[0];
    

?>
<header class="encabezado">

	<label class="fa fa-bars" id="mostrar-menu"></label> 

	<a id="content_log" href="#" class="navbar-brand"><img id="logo_inside" src="../assets/img/Logo/logo.png"></a>

	<p id="corto">T.C</p> <p id="largo" style="font-size: 20px;">TESOROS DEL CARIBE</p>
	
	<div class="dropdown pull-right">
	<a class="logout dropdown-toggle" id="dropdown1" data-toggle="dropdown" role="button" href="#"><img class="img-responsive img-circle" id="foto-usuario" src="../assets/img/foto-usuario/<?php echo''.$registro2["imagen"].''?>" width="27" height="25"><span id="nombre-usuario"><?php echo $primerNom.' '.$primerApe?></span> <span class="caret"></span></a>
	<ul class="dropdown-menu drop" role="menu" aria-labelledby="dropdown1">
	   <div class="dropdown-header">
	   <img class="img-responsive img-circle" id="dropdown-img" src="../assets/img/foto-usuario/<?php echo''.$registro2["imagen"].''?>" width="27" height="25">
		 
		</div>
		<div class="contenido-dropdown">
			<h5><?php echo''.$_SESSION["tipo"].''?></h5>
			
		</div>
		
		<div class="pies-dropdown">
			<a href="perfil.php" class="btn btn-success pull-left">Perfil</a> <button class="btn btn-warning pull-right" onclick="salir();">Cerrar Sesion</button>
			
		</div>
		
		
	</ul>
	</div>
	
</header>
<script type="text/javascript">
	function salir(){
	alertify.confirm('Cerrar sesion','¿Seguro que quieres salir?', function(e){
		if(e){
			$(location).attr('href','../controllers/login/logout.php');

		}else{
			return false;
		}

	},null).set('labels',{ok:'Si', cancel:'No'}).set({transition:'slide'});
	}
</script>