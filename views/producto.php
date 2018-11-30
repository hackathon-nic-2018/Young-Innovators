<?php
	session_start();
	if(!isset($_SESSION["usuario"])){
  		header("location:../index.php");
	}
?>

<!DOCTYPE html>
<html lang="es">
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
	<div class="principal">
		<div class="action-bar">

		<div class="titulo">
			<p>Registro de Productos</p>
		</div>
		<div class="has-feedback pull-right">
		<input id="busquedaProducto" type="search" placeholder="Busque aqui" class="form-control busqueda">
		<i class="glyphicon glyphicon-search form-control-feedback icono-login"></i>
		</div>
		<button id="nuevo_registro" class="btn btn-primary pull-left">Registrar</button> 

		</div>
		
		<!-- contenido -->
		<div style="margin-bottom: 0;" class="panel contenedor">
		<div class="dataPanel" id="datosProductos">
		</div>
		</div>

		<!-- Paginacion -->
		<div style="width: 100%; margin: 0; background-color: #fff;">
			<div style="width: 100%; text-align: center;">
			<ul style="margin: 0;" class="pagination pagination-sm" id="detallePagina"></ul>
			<div>
			<ul style="margin: 0;" class="pagination pagination-sm" id="anterior"></ul>
			<ul style="margin: 0;width: 141px; height: 30px; overflow-y: hidden; " class="pagination pagination-sm" id="pagination"></ul>
			<ul style="margin: 0;" class="pagination pagination-sm" id="siguiente"></ul>
			</div>
		    </div>
		</div>
		
<!-- Modal para Registro -->			
		<div class="modal fade" id="ModProducto" role="dialog"  aria-hidden="true">
			<div class="contenedor-registro">
				<div class="contenedor-header">
					<i class="glyphicon glyphicon-remove-sign pull-right cerrarModal close" data-dismiss="modal"></i>
					<p><strong>Registro Producto</strong></p>
				</div>
				<form  enctype="multipart/form-data" autocomplete="off" id="formulario" class="formulario" onsubmit="return agregaProducto();">
				        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input required="required" class="input-oculto" type="text" id="id_categoria" name="categoria">
							<label>Categoria</label>
								<div class="input-group">
				    				<input readonly="readonly" type="text" id="nombre_cat" class="form-control" placeholder="Seleccione Categoria">
				    				<span class="input-group-addon spanAddon">
				    					<button class="btn btn-success btn-sm boton dropdown-toggle" type="button" id="subM" data-toggle="dropdown" aria-extended="true">
				    					<i class="glyphicon glyphicon-search"></i>
				    					Buscar
				    					</button>

				    					<ul class="dropdown-menu dropMenuOption" role="nenu" aria-labelledby="subM">
				    						<div class="busquedaEnDropdown">
                          	  					<input id="busquedaCategoria" type="search" name="search" class="form-control" placeholder="Buscar Categoria">
                          	  				</div>

                          	  				<div class="resultado" id="resultadoCategoria">
                          	  	
                          	  					<?php
                          	  						$query = mysqli_query($conexion, "SELECT * FROM categoria LIMIT 0,10");

                          	  						echo '<table class="searchTable table-triped table-condensed table-hover">';

                          	  						while ($dt = mysqli_fetch_array($query)) {
                          	  							echo '<tr>
                          	  									<td>'.$dt['nombre'].'</td>
                          	  									<td class="iconTd">
                          	  										<a onclick="pegaDatos('.$dt['id_categoria'].',\''.$dt['nombre'].'\');" class="btn btn-success btn-sm">
                          	  					  					<i class="glyphicon glyphicon-arrow-right"></i>
                          	  										</a>
                          	  									</td>
                          	  				  				 </tr>';
                          	  			
                          	  						}

                          	  						echo '</table';
                          	  					?>
                          	  				</div>
    					
                        				</ul>
				    	
				    				</span>
			    				</div>
	
						</div>

						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">			
							<label>Codigo</label><input type="text" required="required" name="codigo" class="form-control" id="codigo">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" placeholder="nombre del producto" class="form-control">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Stock</label><input type="text" name="stock" class="form-control" id="stock">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Descripcion</label><input type="text" name="descripcion" class="form-control" id="descripcion">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Imagen Producto</label>
							<input type="file"  name="foto" class="form-control" id="foto">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Condicion</label>
							<select name="condicion" id="condicion" class="form-control">
								<option value ="1">Activo</option>
								<option value ="0">Desactivado</option>
					
							</select>
						</div>

						
						<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input required="required" class="input-oculto" type="text" id="id_duenio" name="nombreDuenio">
							<label>Dueño del producto</label>
								<div class="input-group">
				    				<input readonly="readonly" type="text" id="nombreDuenio" class="form-control" placeholder="Seleccione Propietario">
				    				<span class="input-group-addon spanAddon">
				    					<button class="btn btn-success btn-sm boton dropdown-toggle" type="button" id="subM" data-toggle="dropdown" aria-extended="true">
				    					<i class="glyphicon glyphicon-search"></i>
				    					Buscar
				    					</button>

				    					<ul class="dropdown-menu dropMenuOption" role="nenu" aria-labelledby="subM">
				    						<div class="busquedaEnDropdown">
                          	  					<input id="busquedaDuenio" type="search" name="search" class="form-control" placeholder="Buscar dueño producto">
                          	  				</div>

                          	  				<div class="resultado" id="resultadoDuenio">
                          	  	
                          	  					<?php
                          	  						$query = mysqli_query($conexion, "SELECT * FROM usuario WHERE tipo != 'Administrador' LIMIT 0,10");

                          	  						echo '<table class="searchTable table-triped table-condensed table-hover">';

                          	  						while ($dt = mysqli_fetch_array($query)) {
                          	  							echo '<tr>
                          	  									<td>'.$dt['nombres'].' '.$dt['apellidos'].'</td>
                          	  									<td class="iconTd">
                          	  										<a onclick="pegaDatos2('.$dt['id_usuario'].',\''.$dt['nombres'].'\',\''.$dt['apellidos'].'\');" class="btn btn-success btn-sm">
                          	  					  					<i class="glyphicon glyphicon-arrow-right"></i>
                          	  										</a>
                          	  									</td>
                          	  				  				 </tr>';
                          	  			
                          	  						}

                          	  						echo '</table';
                          	  					?>
                          	  				</div>
    					
                        				</ul>
				    	
				    				</span>
			    				</div>
	
						</div>
						
		


				   <div style="clear: both;" class="mensaje"></div>
		           <div class="contenedor-footer">
		           	    <input type="submit" value="Registrar" class="btn btn-success" id="reg"/> 
						<a class="btn btn-danger" data-dismiss="modal">Cerrar</a>
		           </div>
				</form>

			</div>
		</div>

	<!-- Modal para Edicion -->
	<div class="modal fade" id="ediModUsuario" role="dialog"  aria-hidden="true">
			<div class="contenedor-registro">
				<div class="contenedor-header">
					<i class="glyphicon glyphicon-remove-sign pull-right cerrarModal close" data-dismiss="modal"></i>
					<p><strong>Edicion Usuario</strong></p>
				</div>
				<form autocomplete="off" id="formularioEdi" class="formulario" onsubmit="return edicionUsuario();">
							<input class="form-control input-oculto" type="text" required="required" readonly id="id_usuario" name="id_usuario" readonly="readonly" style="visibility:hidden; height:1px;"/>

						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Nombres</label><input type="text" required="required" name="nombres" class="form-control" id="edinombre">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">			
							<label>Apellidos</label><input type="text" required="required" name="apellidos" class="form-control" id="ediapellido">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Sexo</label>
							<select name="sexo" id="edisexo" class="form-control">
								<option value ="M">Masculino</option>
								<option value ="F">Femenino</option>	
							</select>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Telefono</label><input type="number"  name="telefono" class="form-control" id="editelefono">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Correo</label><input type="email" name="correo" class="form-control" id="edicorreo">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Usuario</label><input type="text" name="usuario" class="form-control" id="ediusuario">
						</div>
					
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Direccion</label><input type="text" required="required" name="direccion" class="form-control" id="edidireccion">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Descripcion</label><input type="text" required="required" name="descripcion" class="form-control" id="edidescripcion">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Tipo</label>
							<select name="tipo" id="editipo" class="form-control">
								<option value ="Artesano">Artesano</option>
								<option value ="Mueblero">Mueblero</option>
								<option value ="Administrador">Administrador</option>
							</select>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Estado</label>
							<select name="estado" id="ediestado" class="form-control">
								<option value ="1">Activo</option>
								<option value ="0">Desactivado</option>	
							</select>
						</div>
                    

				   <div style="clear: both;" class="mensaje"></div>
		           <div class="contenedor-footer">
		           	    <input type="submit" value="Registrar" class="btn btn-success" id="reg"/> 
						<a class="btn btn-danger" data-dismiss="modal">Cerrar</a>
		           </div>
				</form>

			</div>
		</div>

		
	</div>

	<!--Pie de pagina-->
	<?php include_once '../includes/footerInside.php';?>

	
	<!--Scripts js-->
	<?php include_once '../includes/jsInside.php';?>
	<script src="../assets/js/funsionProducto.js"></script>
</body>
</html>