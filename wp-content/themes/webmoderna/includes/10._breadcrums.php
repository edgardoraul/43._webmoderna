<?php // Las migajas de pan cordero, chicharrón y un poco de casero

function the_breadcrums()
{
// Defino la ubicación como una variable; así la puedo cargar en la función del breadcrums.
	// $ubicacion = __('Ud. está aquí: ', 'webmoderna');
	echo '<div class="breadcrums"><ul class="breadcrums__list">';
	if ( !is_home() )
	{
		echo '<li class="breadcrums__list__item">' . __('Tu estás aquí: ', 'webmoderna') . '</li>';
		echo '<li class="breadcrums__list__item"><a href="' . get_option('home') . '">' . __('Inicio', 'webmoderna') . '</a></li>';

		if ( is_category() )
		{
			echo single_cat_title( '<li class="breadcrums__list__item">', true, '</li>' );
		};

		if ( is_tag() )
		{
			echo single_tag_title( '<li class="breadcrums__list__item">', true, '</li>' );
		};

		if ( is_single() )
		{
			echo '<li class="breadcrums__list__item">';
			the_category('</li><li>', 'single', false);
			echo '</li>';
			echo '<li class="breadcrums__list__item">';
			echo the_title();
			echo '</li>';
		};

		if ( is_page() )
		{
			echo '<li class="breadcrums__list__item">';
			echo the_title();
			echo '</li>';
		};
	};
echo '</ul></div>';
};

;?>