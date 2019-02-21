<?php // Sidebars
function barras_laterales()
{
	$args = array(
		'id'            => 'sidebar_right',
		'class'         => 'widget--box',
		'name'          => __( 'Barra Lateral Derecha', 'webmoderna' ),
		'description'   => __( 'Una sola a la derecha', 'webmoderna' ),
		'before_title'  => '<header class="sidebar__section__header"><h3 class="sidebar__section__header__title">',
		'after_title'   => '</h3></header><article class="sidebar__section__article">',
		'before_widget'	=>	'<section class="sidebar__section">',
		'after_widget'	=>	'</article></section>'
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'barras_laterales' );
?>