// Codigo para la funcionalidad del boton de ir hacia arriba ubicado en todas las páginas.
$(document).ready(function(){
	$('.ir-arriba').click(function() {
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
	$(window).scroll(function() {
		if($(this).scrollTop() > 0) {
			$('.ir-arriba').slideDown(300);
		}else {
			$('.ir-arriba').slideUp(300);
		};
	});
});

// Codigo para la funcionalidad del boton del menu en dispositivos moviles
function myFunction() {
	var x = document.getElementById("mostrar-ocultar");
	if (x.style.display === "none") {
	  x.style.display = "flex";
	} else {
	  x.style.display = "none";
	}
  }

// Codigo para el CAROUSEL
  window.addEventListener('load', function(){
	new Glider(document.querySelector('.carousel__lista'), {
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: '.carousel__indicadores',
		arrows: {
			prev: '.carousel__anterior',
			next: '.carousel__siguiente'
		},
		responsive: [
			{
			  // screens greater than >= 775px
			  breakpoint: 450,
			  settings: {
				// Set to `auto` and provide item width to adjust to viewport
				slidesToShow: 2,
				slidesToScroll: 2
			  }
			},{
			  // screens greater than >= 1024px
			  breakpoint: 800,
			  settings: {
				slidesToShow: 4,
				slidesToScroll: 4
			  }
			}
		]
	});
});

function mostrar() {
    var x = document.getElementById('Servidores');
    x.classList.toggle("visible");
}

function mostrar1() {
    var x = document.getElementById('Soporte');
    x.classList.toggle("visible");
}

function mostrar2() {
    var x = document.getElementById('Redes');
    x.classList.toggle("visible");
}
