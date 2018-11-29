$(document).ready(function(){

$('#mostrar-menu').on('click', function(){
$('aside').toggleClass('mostrar-menu');
$('#mostrar-menu').toggleClass('fa fa-bars');
$('#mostrar-menu').toggleClass('fa fa-close');

});

$(function(){
		$('#iniciarSesion').on('click',function(){
		$('#formulario-login')[0].reset();
		$('#ModSesion').modal({
			show:true,
			backdrop:'static'
		});
	});
});



//funsion para el menu acordeon
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
//fin funsion menu acordeon

});
