/* abre el modal para inicio de sesion*/
$('#login').click(function(){
 
$('#ModLogin').modal({
	show:true,
	backdrop:'static',
});

});
/*Fin*/

$('#formulario-login').submit(function(e){
	e.preventDefault();

	$.ajax({
		url: 'controllers/login/login.php',
		method: 'post',
		data: $('#formulario-login').serialize(),
		beforeSend: function(){


		},

		success: function(dt){
			var data = eval(dt);

			alertify.alert('Alerta', `${data[0]} ${data[1]}`);

		}

	});
});




/*Funsion para el login
  $('#formulario-login').submit(function(e){
    e.preventDefault();

    var url = "controladores/login/login.php";
      var user = $('#user').val();
      var pass = $('#pass').val();
      if($.trim(user).length > 0 && $.trim(pass).length > 0){
        $.ajax({
          url:url,
          method:"POST",
          data:$('#formulario-login').serialize(),
          cache:"false",
          beforeSend:function() {
            $('.icocargando').css('visibility', 'visible');
          },
          success:function(data) {
            setTimeout(function(){
            $('.icocargando').css('visibility', 'hidden');
            if (data=="1") {
              $(location).attr('href','vistas/inicio.php');

            } else {
              if (data=="0") {
                 $(".mensaje").html("<div style='text-align:justify;' class='alert alert-dismissible alert-warning'><i class='glyphicon glyphicon-warning-sign'></i> <button type='button' class='close' data-dismiss='alert'>×</button> Su cuenta esta desactivada, consulte al administrador para activarlo.</div>");
              }else{
                if (data=="!1") {
            $('#formulario-login')[0].reset();
            $('#login').val("Entrar");
             $(".mensaje").html("<div style='text-align:justify;' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>×</button>Usuario o contraseña incorrecta.</div>");
              }
              }
            }
            }, 1000);
          }
        });
      }else{
      	alertify.alert('Alerta', 'Los campos son obligatorios');
      }

  }); */
