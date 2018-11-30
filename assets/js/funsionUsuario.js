$(document).ready(pagination(1));

/*Script para Usuario*/
$(function(){
	
		$('#nuevo_registro').on('click',function(){
		$('#formulario')[0].reset();
		$('#reg').show();
		$('#ModUsuario').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#busquedaUsuario').on('keyup',function(){
		var dato = $('#busquedaUsuario').val();
		var url = '../controllers/usuario/buscaUsuario.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#datosUsuario').html(datos);
		}
	});
	return false;
	});
	
});

function agregaUsuario(){
	var url = '../controllers/usuario/agregaUsuario.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			$('#formulario')[0].reset();
			var array = eval(registro);
			$('#datosUsuario').html(array[0]);
			$('.mensaje').html(array[5]);
			if (array[3] < array[4]) {
				$('#pagination').html(array[1]);
			    $('#detallePagina').html(array[2]);
			    $('#anterior').html(array[6]);
			    $('#siguiente').html(array[7]);

			}
			return false;
			
		}
	});
	return false;
}

function edicionUsuario(){
	var url = '../controllers/usuario/edicionUsuario.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formularioEdi').serialize(),
		success: function(registro){
			var array = eval(registro);
			$('#datosUsuario').html(array[0]);
			$('.mensaje').html(array[5]);
			if (array[3] < array[4]) {
				$('#pagination').html(array[1]);
			    $('#detallePagina').html(array[2]);
			    $('#anterior').html(array[6]);
			    $('#siguiente').html(array[7]);

			}
			return false;
		}
	});
	return false;
}

function eliminarUsuario(id){
	var url = '../controllers/usuario/eliminaUsuario.php';
	alertify.confirm('Alerta!','¿Esta seguro de eliminar este registro?', function(e){
		if(e){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			var array = eval(registro);
			$('#datosUsuario').html(array[0]);
			$('.mensaje').html(array[5]);
			if (array[4] <= array[3]) {
				$('#pagination').html('');
			    $('#detallePagina').html('');
			    $('#anterior').html('');
			    $('#siguiente').html('');

			}else{
				$('#pagination').html(array[1]);
			    $('#detallePagina').html(array[2]);
				$('#anterior').html(array[6]);
			    $('#siguiente').html(array[7]);
			}
			return false;
		}
	});
	}else{
		return false;
	}

	},null).set('labels',{ok:'Aceptar', cancel:'Cancelar'}).set({transition:'slide'});

}

function activaDesactiva(id){
	var data = 'id='+id;
	var estado = $('#'+id).val();
	if (estado =='1') {
		var frase = '¿Seguro que quieres desactivarlo?';
	}else{
		frase = '¿Seguro que quieres Activarlo?';
	}

	var url = '../controllers/usuario/activar-desactivar.php';
	alertify.confirm("<i style='color:green;' class='glyphicon glyphicon-warning-sign'></i> Alerta!", frase, function(e){
		if(e){
		$.ajax({
		type:'POST',
		url:url,
		data:data,
		success: function(registro){
			var array = eval(registro);
			$('#datosUsuario').html(array[0]);
			$('.mensaje').html(array[5]);
			if (array[3] < array[4]) {
				$('#pagination').html(array[1]);
			    $('#detallePagina').html(array[2]);

			}
			return false;
		}
	});
	
	}else{
		return false;
	}
	},null).set('labels',{ok:'Aceptar', cancel:'Cancelar'}).set({transition:'slide'}); 

}

function editarUsuario(id){
	var url = '../controllers/usuario/editaUsuario.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#edi').show();
				$('#id_usuario').val(id);
				$('#edinombre').val(datos[0]);
				$('#ediapellido').val(datos[1]);
				$('#edisexo').val(datos[2]);
				$('#editelefono').val(datos[3]);
				$('#edicorreo').val(datos[4]);
				$('#ediusuario').val(datos[5]);
				$('#edidireccion').val(datos[6]);
				$('#edidescripcion').val(datos[7]);
				$('#editipo').val(datos[8]);
				$('#ediestado').val(datos[9]);
				$('#ediModUsuario').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
		
}

function pagination(partida){
	var url = '../controllers/usuario/paginarUsuario.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#datosUsuario').html(array[0]);
			if (array[3] < array[4]) {
				$('#pagination').html(array[1]);
			    $('#detallePagina').html(array[2]);
			    $('#anterior').html(array[5]);
			    $('#siguiente').html(array[6]);
			}
			
		}
	});
	return false;
}

/*Fin script para Usuario*/
