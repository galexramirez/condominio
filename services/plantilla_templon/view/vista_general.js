/* :::::::::::: MOSTRAR Y OCULTAR SIDELBAR :::::::::::::::::::::: */
$('.my-hamburger').on('click',function () {
	var widthBrowser =$(window).width();
	if ( widthBrowser < 768 ){   	
		$('#my-sideBar').toggleClass('my-sideBarClassMostrar');
		$('#my-sideBar').toggleClass('my-sideBarClassOcultar');
	    }
	else{
		
		$('#my-sideBar').toggleClass('my-sideBarClassMostrar');
		$('#my-sideBar').toggleClass('my-sideBarClassOcultar');
        $('#contenido').toggleClass('my-contenido-con-sidebar');
		}
	});

$(document).ready (function() {
	var widthBrowser =$(window).width();
  	if ( widthBrowser < 768 )
	   	{ 
		$('#contenido').removeClass('my-contenido-con-sidebar'); 
		$('#my-sideBar').addClass('my-sideBarClassOcultar');	
		}
  	else{
		$('#my-sideBar').addClass('my-sideBarClassMostrar');
		$('#my-sideBar').removeClass('my-sideBarClassOcultar');	
		$('#contenido').addClass('my-contenido-con-sidebar');
		}
	});

$(window).resize(function() {
	var widthBrowser =$(window).width();
	var heightBrowser =$(window).height();
	if ( widthBrowser < 768 ){   	
		$('#my-sideBar').removeClass('my-sideBarClassMostrar');
		$('#my-sideBar').addClass('my-sideBarClassOcultar');	
		$('#contenido').removeClass('my-contenido-con-sidebar');
	}
	else{
		$('#my-sideBar').addClass('my-sideBarClassMostrar');
		$('#my-sideBar').removeClass('my-sideBarClassOcultar');	
		$('#contenido').addClass('my-contenido-con-sidebar');
	}
});

/* :::::::::::: PRE LOADER :::::::::::::::::::::: */
$( "body" ).prepend( '<div id="preloader"><div class="spinner-border text-success" id="status"> </div></div>' );
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({'overflow':'visible'});
})

