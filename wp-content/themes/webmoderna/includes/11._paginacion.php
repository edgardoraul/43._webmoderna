<?php // Paginación avanzada
function pagination( $pages = '', $range = 2 )
{
	$pagina_palabra			= __('Página', 'webmoderna');
	$de_palabra				= __('de', 'webmoderna');
	$primero				= __('Primero', 'webmoderna');
	$atras					= __('Atrás', 'webmoderna');
	$siguiente				= __('Siguiente', 'webmoderna');
	$ultimo					= __('Último', 'webmoderna');
	$showitems				= ( $range * 2 ) + 1;
	global $paged;
	if( empty( $paged ) ) $paged = 1;
	if( $pages == '' )
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if( !$pages )
		{
			$pages = 1;
		}
	}
	if( 1 != $pages )
	{
		echo '<div class="paginacion">';
		echo '<span class="paginacion__item">' . $pagina_palabra . ' ' . $paged . ' ' . $de_palabra . ' ' . $pages . '</span>';

		if( $paged > 2 && $paged > $range+1 && $showitems < $pages )
		{
			echo '<a class="paginacion__item paginacion__first" href="' . get_pagenum_link(1) . '" title="' . $primero . '"></a>';
		}

		if( $paged > 1 && $showitems < $pages )
		{
			echo '<a class="paginacion__item paginacion__back" rel="previous" title="' . $atras . '" href="' . get_pagenum_link( $paged - 1 ) . '"></a>';
		}

		for ( $i = 1; $i <= $pages; $i++ )
		{
			if ( 1 != $pages && ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) )
			{
				echo ( $paged == $i )? '<span class="paginacion__item paginacion__current">' . $i . '</span>':'<a href="' . get_pagenum_link($i) . '" class="paginacion__item" title="' . $i . '">'. $i . '</a>';
			}
		}
		if ( $paged < $pages && $showitems < $pages )
		{
			echo '<a class="paginacion__item paginacion__next" rel="next" title="' . $siguiente . '" href="' . get_pagenum_link( $paged + 1 ) . '"></a>';
		}

		if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages )
		{
			echo '<a class="paginacion__item paginacion__last" title="' . $ultimo . '" href="' . get_pagenum_link( $pages ) . '"></a>';
		}
		echo '</div>';
	};
};
?>