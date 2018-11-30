/* abre el modal para inicio de sesion*/
$('#login').click(function(){

  $('#formulario-login')[0].reset();
 
$('#ModLogin').modal({
	show:true,
	backdrop:'static',
});

});
/*Fin*/


/*Funsion para el login*/
  $('#formulario-login').submit(function(e){
    e.preventDefault();

    var url = "controllers/login/login.php";
      var user = $('#usuario').val();
      var pass = $('#clave').val();
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
              $(location).attr('href','views/inicio.php');

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

  });
