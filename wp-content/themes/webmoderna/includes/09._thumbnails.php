<?php

// Colocar figure en las imágenes insertadas
add_filter( 'image_send_to_editor',
	function( $html, $id, $caption, $title, $align, $url, $size, $alt )
	{
		if( current_theme_supports( 'html5' )  && ! $caption )
			$html = sprintf( '<figure>%s</figure>', $html );
		return $html;
	}, 10, 8 );

// Definir tamaños personalizados de miniaturas - hay que configurarlas
/*add_theme_support( 'post-thumbnails', array(
	'post',
	'page',
	'sliders',
	)
);*/
add_theme_support('post-thumbnails');

// Las thumbnails por defecto
the_post_thumbnail( 'thumbnail' );
the_post_thumbnail( 'medium' );
the_post_thumbnail( 'large' );
the_post_thumbnail( 'full' );

// Tamaños fijos recortados
add_image_size('custom-thumb-100-100', 100, 100, true);
add_image_size('custom-thumb-200-200', 200, 200, true);
add_image_size('custom-thumb-300-200', 300, 200, true);
add_image_size('custom-thumb-300-300', 300, 300, true);
add_image_size('custom-thumb-400-300', 400, 300, true);
add_image_size('custom-thumb-600-400', 600, 400, true);
add_image_size('custom-thumb-600-600', 600, 600, true);
add_image_size('custom-thumb-900-600', 900, 600, true);
add_image_size('custom-thumb-900-900', 900, 900, true);

// Sliders
add_image_size('custom-thumb-600-250', 600, 250, true);
add_image_size('custom-thumb-900-333', 600, 333, true);
add_image_size('custom-thumb-1200-500', 1200, 500, true);
add_image_size('custom-thumb-2400-1000', 2400, 1000, true);
add_image_size('custom-thumb-3600-1200', 3600, 1500, true);

// Fotos redimensionables según el tamaño de pantalla
add_image_size('custom-thumb-200-x', 200, false);
add_image_size('custom-thumb-300-x', 300, false);
add_image_size('custom-thumb-600-x', 600, false);
add_image_size('custom-thumb-900-x', 900, false);
add_image_size('custom-thumb-1200-x', 1200, false);
add_image_size('custom-thumb-1500-x', 1500, false);
add_image_size('custom-thumb-1800-x', 1800, false);
add_image_size('custom-thumb-2100-x', 2100, false);

// Añadiendo al listado del gestor de multimedia
add_filter('image_size_names_choose', 'hmuda_image_sizes');
function hmuda_image_sizes($sizes)
{
	$addsizes = array(
		// Tamaños fijos
		"custom-thumb-100-100"		=>	__("Tamaño recortado 0"),
		"custom-thumb-200-200"		=>	__("Tamaño recortado 1"),
		"custom-thumb-300-200"		=>	__("Tamaño recortado 2"),
		"custom-thumb-300-300"		=>	__("Tamaño recortado 3"),
		"custom-thumb-400-300"		=>	__("Tamaño recortado 4"),
		"custom-thumb-600-400"		=>	__("Tamaño recortado 5"),
		"custom-thumb-600-600"		=>	__("Tamaño recortado 5 - cuadrado"),
		"custom-thumb-900-600"		=>	__("Tamaño recortado 6"),
		"custom-thumb-900-900"		=>	__("Tamaño recortado 6 - cuadrado"),
		"custom-thumb-600-250"		=>	__("Tamaño recortado 7"),
		"custom-thumb-900-333"		=>	__("Tamaño recortado 8"),
		"custom-thumb-1200-500"		=>	__("Tamaño recortado 9"),
		"custom-thumb-1500-1000"	=>	__("Tamaño recortado 10"),
		"custom-thumb-2400-1000"	=>	__("Tamaño recortado 11"),
		"custom-thumb-3600-1500"	=>	__("Tamaño recortado 12"),

		// Tamaños adaptables
		"custom-thumb-200-x"		=>	__("Tamaño adaptable 0"),
		"custom-thumb-300-x"		=>	__("Tamaño adaptable 1"),
		"custom-thumb-600-x"		=>	__("Tamaño adaptable 2"),
		"custom-thumb-900-x"		=>	__("Tamaño adaptable 3"),
		"custom-thumb-1200-x"		=>	__("Tamaño adaptable 4"),
		"custom-thumb-1500-x"		=>	__("Tamaño adaptable 5"),
		"custom-thumb-1800-x"		=>	__("Tamaño adaptable 6"),
		"custom-thumb-2100-x"		=>	__("Tamaño adaptable 7"),
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}


// Agrandar el máximo ancho de imagen
function set_max_srcset_image_width( $max_width, $size_array )
{
	$width = $size_array[0];
	if ( $width >= 900 )
	{
		$max_width = 2700;
	}
	return $max_width;
}
add_filter( 'max_srcset_image_width', 'set_max_srcset_image_width', 10, 2 );

// Habilitar la compresión de imágenes
// add_filter( 'jpeg_quality', create_function( '', 'return 75;' ) );



function simone_set_image_transient( $post_id )
{
	// 1°. Creando la variables con los ID's y el atributo alt=""
	$attachment_id = get_post_thumbnail_id( $post_id );
	$alt_text = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
	if ( !$alt_text ) { $alt_text = esc_html( get_the_title($post_id) ); }

	// Todos los tamaños comunes pasados a variables
	$thumbnail				=	wp_get_attachment_image_src( $attachment_id, 'thumbnail' );
	$medium					=	wp_get_attachment_image_src( $attachment_id, 'medium' );
	$large					=	wp_get_attachment_image_src( $attachment_id, 'large' );
	$full					=	wp_get_attachment_image_src( $attachment_id, 'full' );

	// Tamaños recortados pasados a variables
	$custom_thumb_100_100	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-100-100');
	$custom_thumb_200_200	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-200-200');
	$custom_thumb_300_200	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-300-200');
	$custom_thumb_300_300	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-300-300');
	$custom_thumb_400_300	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-400-300');
	$custom_thumb_400_400	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-400-400');
	$custom_thumb_600_400	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-600-400');
	$custom_thumb_600_600	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-600-600');
	$custom_thumb_900_600	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-900-600');
	$custom_thumb_900_900	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-900-900');

	$custom_thumb_600_250	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-600-250');
	$custom_thumb_900_333	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-900-333');
	$custom_thumb_1200_500	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-1200-500');
	$custom_thumb_2400_1000	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-2400-1000');
	$custom_thumb_3600_1500	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-3600-1500');

	// Tamaños con altura automática pasados a variables
	$custom_thumb_200_x		=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-200-x');
	$custom_thumb_300_x		=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-300-x');
	$custom_thumb_600_x		=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-600-x');
	$custom_thumb_900_x		=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-900-x');
	$custom_thumb_1200_x	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-1200-x');
	$custom_thumb_1500_x	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-1500-x');
	$custom_thumb_1800_x	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-1800-x');
	$custom_thumb_2100_x	=	wp_get_attachment_image_src($attachment_id, 'custom-thumb-2100-x');

	// Pasando las variables a un array
	$thumb_data = array(

		// Comunes
		'thumbnail'					=>	$thumbnail[0],
		'medium'					=>	$medium[0],
		'large'						=>	$large[0],
		'full'						=>	$full[0],

		// Recortadas
		'custom-thumb-100-100'		=>	$custom_thumb_100_100[0],
		'custom-thumb-200-200'		=>	$custom_thumb_200_200[0],
		'custom-thumb-300-200'		=>	$custom_thumb_300_200[0],
		'custom-thumb-300-300'		=>	$custom_thumb_300_300[0],
		'custom-thumb-400-300'		=>	$custom_thumb_400_300[0],
		'custom-thumb-400-400'		=>	$custom_thumb_400_400[0],
		'custom-thumb-600-400'		=>	$custom_thumb_600_400[0],
		'custom-thumb-600-600'		=>	$custom_thumb_600_600[0],
		'custom-thumb-900-600'		=>	$custom_thumb_900_600[0],
		'custom-thumb-900-900'		=>	$custom_thumb_900_900[0],

		'custom-thumb-600-250'		=>	$custom_thumb_600_250[0],
		'custom-thumb-900-333'		=>	$custom_thumb_900_333[0],
		'custom-thumb-1200-500'		=>	$custom_thumb_1200_500[0],
		'custom-thumb-2400-1000'	=>	$custom_thumb_2400_1000[0],
		'custom-thumb-3600-1200'	=>	$custom_thumb_3600_1500[0],

		// Alto automático
		'custom-thumb-200-x'		=>	$custom_thumb_200_x[0],
		'custom-thumb-300-x'		=>	$custom_thumb_300_x[0],
		'custom-thumb-600-x'		=>	$custom_thumb_600_x[0],
		'custom-thumb-900-x'		=>	$custom_thumb_900_x[0],
		'custom-thumb-1200-x'		=>	$custom_thumb_1200_x[0],
		'custom-thumb-1500-x'		=>	$custom_thumb_1500_x[0],
		'custom-thumb-1800-x'		=>	$custom_thumb_1800_x[0],
		'custom-thumb-2100-x'		=>	$custom_thumb_2100_x[0],

		// Atributo alt=""
		'thumb_alt'      => $alt_text
	);

	// Setear el transiente para que funcione
	set_transient( 'featured_image_' . $post_id, $thumb_data, 52 * WEEK_IN_SECONDS );
}

// Resetear el transient cuando se actualize o cambie el post
add_action('save_post', 'simone_reset_thumb_data_transient');
function simone_reset_thumb_data_transient( $post_id )
{
	delete_transient( 'featured_image_' . $post_id );
	if ( has_post_thumbnail($post_id) )
	{
		simone_set_image_transient($post_id);
	}
}

$post_id = ""; // Lo agregué yo porque me daba un error. Hay que probar....

// Reemplazando las funciones básicas del post_thumbnail para que funcione con <picture>. Para eso se crea una función
function simone_the_responsive_thumbnail( $post_id )
{
	// Chequea si hay una imagen transient. Esto es como para aprovechar la caché y no andar haciendo como 20 consultas al servidor al vicio.
	if ( false === ( $thumb_data = get_transient( 'featured_image_' . $post_id ) ) )
	{
		simone_set_image_transient( $post_id );
		$thumb_data = get_transient( 'featured_image_' . $post_id );
	}

	// Mostrando un picture con los tamaños de imágenes
	echo '<picture>';

	// Fallback for IE9
	echo '<!--[if IE 9]><video style="display: none;"><![endif]-->';

	// Modo grandecito
	echo '<source type="image/jpg" srcset="' .
		$thumb_data['custom-thumb-600-x'] . ', ' .
		$thumb_data['custom-thumb-1200-x'] . ' 2x, ' .
		$thumb_data['custom-thumb-1800-x'] . ' 3x" media="(min-width: 1500px)">';

	// Medianito
	echo '<source type="image/jpg" srcset="' .
		$thumb_data['custom-thumb-300-200'] . ' , ' .
		$thumb_data['custom-thumb-600-400'] . ' 2x, '.
		$thumb_data['custom-thumb-900-600'] . ' 3x" media="(min-width: 800px)">';

	// Pequeño
	echo '<source type="image/jpg" srcset="' .
		$thumb_data['thumbnail'] . ', ' .
		$thumb_data['custom-thumb-200-200'] . ' 2x, ' .
		$thumb_data['custom-thumb-300-300'] . ' 3x">';

	// Fallback for IE9
	echo '<!--[if IE 9]></video><![endif]-->';

	// Fallback para las imágenes comunes...obvio
	echo '<img srcset="' .
		$thumb_data['thumbnail'] . ' 100w, ' .
		$thumb_data['custom-thumb-300-200'] . ' 200w, ' .
		$thumb_data['custom-thumb-300-200'] . ' 300w" ' .
		' src="' .
		$thumb_data['custom-thumb-300-200'] . '"
		sizes="(min-width: 1500px) 600vw, (min-width: 800px) 300vw, 100vw"
		alt="' . $thumb_data['thumb_alt'] . '">';
	echo '</picture>';
}


?>