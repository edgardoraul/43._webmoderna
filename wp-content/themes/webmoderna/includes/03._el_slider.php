<?php // configuración del Slider

// Register Custom Post Type
function Sliders()
{

	$labels = array(
		'name'                => _x( 'Sliders', 'Post Type General Name', 'Sliders' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'Sliders' ),
		'menu_name'           => __( 'Slider de la Home', 'Sliders' ),
		'name_admin_bar'      => __( 'Slider de la Home', 'Sliders' ),
		'parent_item_colon'   => __( 'Slider superior:', 'Sliders' ),
		'all_items'           => __( 'Todos los Sliders', 'Sliders' ),
		'add_new_item'        => __( 'Agregar nuevo Slider', 'Sliders' ),
		'add_new'             => __( 'Agregar uno nuevo', 'Sliders' ),
		'new_item'            => __( 'Nuevo Slider', 'Sliders' ),
		'edit_item'           => __( 'Editar Slider', 'Sliders' ),
		'update_item'         => __( 'Actualizar Slider', 'Sliders' ),
		'view_item'           => __( 'Ver Slider', 'Sliders' ),
		'search_items'        => __( 'Buscar Slider', 'Sliders' ),
		'not_found'           => __( 'No hay Sliders', 'Sliders' ),
		'not_found_in_trash'  => __( 'No hay Sliders en la papelera', 'Sliders' ),
	);
	$rewrite = array(
		'slug'                => 'Sliders',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'Slider', 'Sliders' ),
		'description'         => __( 'Sliders', 'Sliders' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-images-alt2',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'Sliders', $args );

}
add_action( 'init', 'Sliders', 0 );
?>