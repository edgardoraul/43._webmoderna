// Redimensionador vertical de los cuadros de mensajes de la home
(function()
{
	$(document).ready( function()
	{
		var winHeight = 0;
		var winWidth = 0;
		setContainerDims();

		function setContainerDims()
		{
			winHeight = parseInt( $(window).height() );
			winWidth = parseInt( $(window).width() );
			$( ".mensajes" ).css(
			{
				"width"		: winWidth,
				"height"	: winHeight
			});
		}
		$(window).resize( function()
		{
			setContainerDims();
		});
	});
}());


// El menú
(function()
{
	$(document).on("ready", inicio);
	function inicio()
	{
		$('#boton_menu').on("click", transicion_abrir);
		function transicion_abrir(ev)
		{
			ev.preventDefault();
			$('.nav__list').slideToggle();

			// Redimensionador
			$(window).resize(redimensionador);
			function redimensionador()
			{
				var ancho = $(window).width();
				if (ancho >= 1000)
				{
					$('.nav__list').addClass('nav__list-abrir');
					$('.nav__list').removeClass('nav__list-cerrar');
				} else {
					$('.nav__list').addClass('nav__list-cerrar');
					$('.nav__list').removeClass('nav__list-abrir')
				}
			}
		/*
			$('.nav__list').addClass('nav__list-abrir');
			$('.nav__list').removeClass('nav__list-cerrar');
			$('#boton_menu').off("click", transicion_abrir);

			// Cerrando el menú
			$('#boton_menu').on("click", transicion_cerrar);
			function transicion_cerrar(ev)
			{
				ev.preventDefault();
				$('.nav__list').addClass('nav__list-cerrar');
				$('.nav__list').removeClass('nav__list-abrir');

				//Para asegurarse el menú abierto o cerrado cuando se redimensione la pantalla
				$(window).resize(redimensionador);
				function redimensionador()
				{
					var ancho = $(window).width();
					if (ancho >= 1000)
					{
						$('.nav__list').addClass('nav__list-abrir');
						$('.nav__list').removeClass('nav__list-cerrar');
					} else {
						$('.nav__list').addClass('nav__list-cerrar');
						$('.nav__list').removeClass('nav__list-abrir')
					}
				}
				$('#boton_menu').off("click", transicion_cerrar);
				$('#boton_menu').on("click", transicion_abrir);
			}
		*/
		}
	}
}());


// Ir arriba
(function()
{
	$(document).on("ready", ir_arriba);

	function ir_arriba()
	{
		$(window).scroll(esconder_mostrar);
		function esconder_mostrar ()
		{
			if( $( this ).scrollTop() > 400 )
			{
				$( "#ir_arriba" ).removeClass( 'gotop-ocultar' );
				$( "#ir_arriba" ).addClass( 'gotop-mostrar' );
			}
			else
			{
				$( "#ir_arriba" ).removeClass( 'gotop-mostrar' );
				$( "#ir_arriba" ).addClass( 'gotop-ocultar' );
			}
		}

		$( "#ir_arriba" ).on( "click", subir );
		function subir()
		{
			$( "body, html, header" ).animate( {
				scrollTop : 0,
				easing : 'easeIn'
			}, 1500 );
			return false;
		}
	}
}());


// Agregado de clases importantísimas y Soporte para IE8 de :even y :odd
(function()
{
	$(document).on("ready", adosador);
	function adosador()
	{
		// Listados ul y ol
		$('li:even').addClass('nth-child-even');
		$('li:odd').addClass('nth-child-odd');
		$('li:first-child').addClass('first-child');
		$('li:last-child').addClass('last-child');

		// Filas de tablas
		$('tr:even').addClass('nth-child-even');
		$('tr:odd').addClass('nth-child-odd');
		$('tr:first-child').addClass('first-child');
		$('tr:last-child').addClass('last-child');

		// Los cuerpos cruzados
		$('.cruzados__article:even').addClass('nth-child-even');
		$('.cruzados__article:odd').addClass('nth-child-odd');
		$('.cruzados__article:first-child').addClass('first-child');
		$('.cruzados__article:last-child').addClass('last-child');

		// Post del sidebar
		$('.sidebar__section__article__post:even').addClass('nth-child-even');
		$('.sidebar__section__article__post:odd').addClass('nth-child-odd');
		$('.sidebar__section__article__post:first-child').addClass('first-child');
		$('.sidebar__section__article__post:last-child').addClass('last-child');

		// Entradas
		$('.entradas_article:even').addClass('nth-child-even');
		$('.entradas_article:odd').addClass('nth-child-odd');
		$('.entradas_article:first-child').addClass('first-child');
		$('.entradas_article:last-child').addClass('last-child');

		// Categorización de los posts
		$('.categorizacion:even').addClass('nth-child-even');
		$('.categorizacion:odd').addClass('nth-child-odd');
		$('.categorizacion:first-child').addClass('first-child');
		$('.categorizacion:last-child').addClass('last-child');

		// Agregando clases a los contenedores de las imágenes insertadas con WordPress
		// $('.size-thumbnail').parents('.wp-caption').addClass('size-thumbnail');
		// $('.size-medium').parents('.wp-caption').addClass('size-medium');
		// $('.size-large').parents('.wp-caption').addClass('size-large');
		// $('.size-full').parents('.wp-caption').addClass('size-full');
	}
}());


// Soporte para IE11 en el Flexbox (funcioanrá?)
(function()
{
	if ( navigator.userAgent.match( /msie|trident/i ) )
	{
		$( '.display-flex' ).removeClass( 'flexbox' ).addClass( 'no-flexbox' );
	}
}());


// El Slider
$( document ).ready( function()
{
	// Slider de la home principal
	$( "#owl-dos" ).owlCarousel({
		autoPlay: true,
		items: 1,
		lazyLoad : true,
		autoHeight : true,
		singleItem : true
	});

	// Activación del slider de la home de portfolio
	$( "#owl-uno" ).owlCarousel({
		autoPlay: true,
		lazyLoad : true
	});

	// Slider galería de una entrada
	$( "#owl-galeria" ).owlCarousel({
		autoPlay: true,
		lazyLoad : true,
		items: 3
	});
});


// Activación del Lightbox
$(document).ready(function()
{
	(function()
	{
		$('.swipebox').swipebox({
			// useCSS : false,
			// useSVG : false
			// removeBarsOnMobile : false,
			// hideBarsDelay : false,
			// transitionStyle : "goDown"
		});
	})(jQuery);
});