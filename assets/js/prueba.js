$('#datosPersonales').submit(function(e){
	e.preventDefault();

	$.ajax({
		url: 'controllers/prueba.php',
		method: 'POST',
		data: $('#datosPersonales').serialize(),
		beforeSent: function(){

		},

		success: function(dt){
			var dt = eval(dt);

			alertify.alert('Tesoros del caribe dice:', `${dt[0]} ${dt[1]}`);

		},


	});

});