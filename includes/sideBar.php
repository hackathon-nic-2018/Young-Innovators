<aside class="menu-lateral">
	<div style="width: 100%;height: 100px;background-image: url(../assets/img/kali.jpg);padding: 5px;">
	<div style="width: 60px;height: 60px;border-radius:35px;margin-bottom: 10px;">
	<a href="perfil.php"><img class="img-responsive img-circle" id="dropdown-img" src="../assets/img/foto-usuario/<?php echo''.$registro2["imagen"].''?>" width="27" height="25"></a>
		
	</div>
	<div>
		<a href="perfil.php"><b style="color: #fff;"><?php echo $primerNom.' '.$primerApe?></b></a>
	</div>
	
	</div>

<ul id="accordion" class="accordion">
       <?php
        if ($_SESSION['tipo']=='Administrador') {
       ?>
		<li>
			<a class="link" href="inicio.php"><i class="fa fa-home"></i>Inicio</a>
		</li>
		<li>
			<a class="link" href="foro.php"><i class="fa fa-wpforms "></i>Producto</a>
		</li>
		<li>
			<div class="link"><i class="fa fa-cog"></i>Registros<span class="ico-badge badge">6</span><i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
			<li><a href="usuario.php">Usuarios</a></li>
			<li><a href="docente.php">Opcion2</a></li>
			<li><a href="estudiante.php">Opcion3</a></li>
			<li><a href="asignatura.php">Opcion4</a></li>
			<li><a href="nota1.php">Opcion5</a></li>
			<li><a href="nota2.php">Opcion6</a></li>
			</ul>
		</li>
		<li>
			<a class="link" href="prestamo.php"><i class="fa fa-wpforms "></i>Opcion</a>
		</li>

	  <?php
  	    }elseif ($_SESSION['tipo']=='Artesano') {
	  ?>

		<li>
			<a class="link" href="inicio.php"><i class="fa fa-home"></i>Inicio</a>
		</li>
		<li>
			<a class="link" href="foro.php"><i class="fa fa-wpforms "></i>Opcion</a>
		</li>
		<li>
			<div class="link"><i class="fa fa-cog"></i>Registros<span class="ico-badge badge">2</span><i class="fa fa-chevron-down"></i></div>
			<ul class="submenu">
			<li><a href="nota1.php">Opcion</a></li>
			<li><a href="nota2.php">Opcion</a></li>
			</ul>
		</li>

		<?php
		  }elseif ($_SESSION['tipo']=='Mueblero') {
		?>

		<li>
			<a class="link" href="inicio.php"><i class="fa fa-home"></i>Inicio</a>
		</li>
		<li>
			<a class="link" href="foro.php"><i class="fa fa-wpforms "></i>Opcion</a>
		</li>
		<li>
			<a class="link" href="vistanotaestudiante.php"><i class="fa fa-wpforms "></i>Opcion</a>
		</li>
		<li>
		    <a class="link" href="libros.php"><i class="fa fa-book"></i>Opcion</a>
		</li>

		<?php
		   }
		?>

	</ul>		
</aside>