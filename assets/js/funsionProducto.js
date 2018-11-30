$(document).ready(pagination(1));



/*Script para prducto*/
	$(function(){
	
		$('#nuevo_registro').on('click',function(){
		$('#formulario')[0].reset();
		$('#reg').show();
		$('#ModProducto').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#busquedaProducto').on('keyup',function(){
		var dato = $('#busquedaProducto').val();
		var url = '../controllers/producto/buscaProducto.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#datosProducto').html(datos);
		}
	});
	return false;
	});
	
});

function agregaProducto(){
	
	$.ajax({
            type: 'POST',
            url: '../controllers/producto/agregaProducto.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
               
            },
            success: function(msg){
            	$('#formulario')[0].reset();
			   
			    var array = eval(msg);
			   $('#datosProducto').html(array[0]);
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

function edicionProducto(){
	var url = '../controllers/productos/edicionProducto.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formularioEdi').serialize(),
		success: function(registro){
			$('#datosProducto').html(registro);
			return false;
		}
	});
	return false;
}

function eliminarProducto(id){
	var url = '../controllers/producto/eliminaProducto.php';
		alertify.confirm('Alerta!','¿Esta seguro de eliminar este registro?', function(e){
		if(e){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			var array = eval(registro);
			$('#datosProducto').html(array[0]);
			if (array[4] <= array[3]) {
				$('#pagination').html('');
			    $('#detallePagina').html('');
			    $('#anterior').html('');
			    $('#siguiente').html('');

			}else{
				$('#pagination').html(array[1]);
			    $('#detallePagina').html(array[2]);
				$('#anterior').html(array[5]);
			    $('#siguiente').html(array[6]);
			}
			return false;
		}
	});
	}else{
		return false;
	}

	},null).set('labels',{ok:'Aceptar', cancel:'Cancelar'}).set({transition:'slide'});
}

function editarProducto(id){
	$('#formulario')[0].reset();
	var url = '../controllers/practica/editaPractica.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#edi').show();
				$('#id_estudiante').val(id);
				$('#nombreEstudiante').val(datos[0]);
				$('#edisexo').val(datos[1]);
				$('#edicorreo').val(datos[2]);
				$('#editelefono').val(datos[3]);
				$('#editelefono_tutor').val(datos[4]);
				$('#ediestudiante').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
		
}

function pagination(partida){
	var url = '../controllers/producto/paginarProducto.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#datosProducto').html(array[0]);
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


$('#busquedaCategoria').keyup(function(){
	var valor = $('#busquedaCategoria').val();
	$.ajax({
	  method: 'POST',
	  data:{dato:valor},
	  url: '../controllers/producto/extraeCategoria.php',
	  beforeSend: function(){

	  },

	  success: function(dato){
		$('#resultadoCategoria').html(dato);
	  }
    });

});

function pegaDatos(id,categoria){

	$('#id_categoria').val(id);
	$('#nombre_cat').val(categoria);

}



$('#busquedaDuenio').keyup(function(){
	var valor = $('#busquedaDuenio').val();
	$.ajax({
	  method: 'POST',
	  data:{dato:valor},
	  url: '../controllers/producto/extraeDuenio.php',
	  beforeSend: function(){

	  },

	  success: function(dato){
		$('#resultadoDuenio').html(dato);
	  }
    });

});

function pegaDatos2(id,nombre,apellido){

	$('#id_duenio').val(id);
	$('#nombreDuenio').val(nombre+' '+apellido);

}

/*Fin script para producto*/