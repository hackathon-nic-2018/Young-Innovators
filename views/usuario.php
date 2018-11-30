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
			<p>Registro de Usuarios</p>
		</div>
		<div class="has-feedback pull-right">
		<input id="busquedaUsuario" type="search" placeholder="Busque aqui" class="form-control busqueda">
		<i class="glyphicon glyphicon-search form-control-feedback icono-login"></i>
		</div>
		<button id="nuevo_registro" class="btn btn-primary pull-left">Registrar</button> 

		</div>

		<!-- contenido -->
		<div style="margin-bottom: 0;" class="panel contenedor">
		<div class="dataPanel" id="datosUsuario">
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
		<div class="modal fade" id="ModUsuario" role="dialog"  aria-hidden="true">
			<div class="contenedor-registro">
				<div class="contenedor-header">
					<i class="glyphicon glyphicon-remove-sign pull-right cerrarModal close" data-dismiss="modal"></i>
					<p><strong>Registro Usuario</strong></p>
				</div>
				<form autocomplete="off" id="formulario" class="formulario" onsubmit="return agregaUsuario();">
				        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Nombres</label><input type="text" required="required" name="nombre" class="form-control" id="nombre">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">			
							<label>Apellidos</label><input type="text" required="required" name="apellido" class="form-control" id="apellido">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Sexo</label>
							<select name="sexo" id="sexo" class="form-control">
								<option value ="M">Masculino</option>
								<option value ="F">Femenino</option>	
							</select>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Telefono</label><input type="text" name="telefono" class="form-control" id="telefono">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Correo</label><input type="email" name="correo" class="form-control" id="correo">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Usuario</label><input type="text"  name="usuario" class="form-control" id="usuario">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Clave</label><input type="password" required="required" name="clave" class="form-control" id="clave">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Direccion</label><input type="text" required="required" name="direccion" class="form-control" id="direccion">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Descripcion</label><input type="text" required="required" name="descripcion" class="form-control" id="descripcion">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Tipo</label>
							<select name="tipo" id="tipo" class="form-control">
								<option value ="Artesano">Artesano</option>
								<option value ="Mueblero">Mueblero</option>
								<option value ="Administrador">Administrador</option>	
							</select>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label>Estado</label>
							<select name="estado" id="estado" class="form-control">
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
							<label>Nombres</label><input type="text" required="required" name="nombre" class="form-control" id="edinombre">
						</div>
						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">			
							<label>Apellidos</label><input type="text" required="required" name="apellido" class="form-control" id="ediapellido">
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
							<label>Clave</label><input type="password" required="required" name="clave" class="form-control" id="ediclave">
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
							<select name="estado" id="ediestado" class="selectpicker">
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
	<script src="../assets/js/funsionUsuario.js"></script>
</body>
</html>