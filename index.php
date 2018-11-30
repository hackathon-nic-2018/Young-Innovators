<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title><?php include_once 'includes/titulo.php';?></title>
	<?php include_once 'includes/css.php';?>
</head>
<body>
	<?php include_once 'includes/header.php';?>

<section  style="background-image: url(assets/img/fondo.jpg);">
	<div  style="height: 100%; background-color: rgba(255,255,255,6); padding: 10px 0, margin-right: -1px, margin-left: -1px;">

	<div class="container">

			<!-- Slide show -->
			<div id="carousel-1" class="carousel slide" data-ride="carousel">
				<!-- Indicadores -->
				<ol style="z-index: 4;" class="carousel-indicators">
					<li data-target="#carousel-1" data-slide-to="0"	class="active" ></li>
					<li data-target="#carousel-1" data-slide-to="1"	></li>
					<li data-target="#carousel-1" data-slide-to="2"	></li>
				</ol>
				<!-- contenedor de los slide -->
				
				<div class="slideIMG carousel-inner" role="listbox">
					<!-- #1 -->
					<div class="item  active">
						<img src="assets/img/carousel/1.jpg" class="caruselIMG img-responsive" alt="">
						<div class="carousel-caption">
							
						</div>
					</div>
					<!-- #2 -->
					<div class="item">
						<img src="assets/img/carousel/2.jpg" class="caruselIMG img-responsive" alt="">
						<div class="carousel-caption">
							
						</div>
					</div>
					<!-- #3 -->
					<div class="item">
						<img src="assets/img/carousel/3.jpg" class="caruselIMG img-responsive" alt="">
						<div class="carousel-caption">
			   				
						</div>
					</div>
				</div>
				<!-- Controles -->
				<a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>
				<a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Siguiente</span>
				</a>
			</div>


		<div class="modal fade" id="ModLogin" role="dialog"  aria-hidden="true">
			<div class="contenedor-registro">

				<!--Login-->
		     <div class="login">
				<i style="top:7px; right: 5px;" class="glyphicon glyphicon-remove-sign pull-right cerrarModal close" data-dismiss="modal"></i>

				<div style="background-color: #337AB7;height:35px;line-height: 30px;text-align:center;">
					<b><p style="font-size: 16px;color:#fff;">Inicio de Sesion</p></b>

				</div>

				<div style="text-align:center;padding:5px;">
				<i style="font-size:25px; visibility:hidden;" class="icocargando glyphicon glyphicon-repeat fa-spin"></i>
				</div>
				<form method="post" id="formulario-login">
					<div class="form-group has-feedback" style="width: 80%; margin: 3px auto;">
						<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
					<i class="glyphicon glyphicon-user form-control-feedback icono-login"></i>
					</div>
					<div class="form-group has-feedback" style="width: 80%; margin: 18px auto;">
						<input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
					<i class="glyphicon glyphicon-lock form-control-feedback icono-login"></i>
					</div>
					<div style="text-align:center;" class="form-group">
						<input type="submit" class="btn btn-success" id= "login" name="login" value="Entrar">
					</div>
					<div style="width:95%;margin:0 auto;" class="mensaje"></div>
				</form>
			
			 </div>
				
				

			</div>

		</div>
		</div>

	</div>

	</section>
	<?php include_once 'includes/footer.php';?>

	<?php include_once 'includes/js.php';?>
</body>
</html>