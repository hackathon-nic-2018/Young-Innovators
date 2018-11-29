<?php
function fecha(){
	date_default_timezone_set("America/Managua");
	$fecha = date("Y");
	$inicio = "2018";
	if ($inicio==$fecha) {
		
	}else{
		echo "-$fecha";
	}

}
?>
<footer class="pie">
    <div class="pull-right hidden-xs">
      <!--<b>Version</b> 1.0-->
    </div>
	<strong>Copyright &copy; 2018<?php fecha();?>, Tesoros del caribe.</strong> Derechos reservados.
</footer>