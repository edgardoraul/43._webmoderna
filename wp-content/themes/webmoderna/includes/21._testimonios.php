<?php

// Register Custom Post Type
function carteles_home() {

	$labels = array(
		'name'                  => _x( 'Carteles', 'Post Type General Name', 'webmoderna' ),
		'singular_name'         => _x( 'Cartel', 'Post Type Singular Name', 'webmoderna' ),
		'menu_name'             => __( 'Carteles del Home', 'webmoderna' ),
		'name_admin_bar'        => __( 'Carteles del Home', 'webmoderna' ),
		'archives'              => __( 'Cartel Archives', 'webmoderna' ),
		'parent_item_colon'     => __( 'Cartel superior:', 'webmoderna' ),
		'all_items'             => __( 'Todos los carteles', 'webmoderna' ),
		'add_new_item'          => __( 'Añadir nuevo cartel', 'webmoderna' ),
		'add_new'               => __( 'Añadir uno nuevo', 'webmoderna' ),
		'new_item'              => __( 'Nuevo cartel', 'webmoderna' ),
		'edit_item'             => __( 'Editar cartel', 'webmoderna' ),
		'update_item'           => __( 'Actualizar cartel', 'webmoderna' ),
		'view_item'             => __( 'Ver cartel', 'webmoderna' ),
		'search_items'          => __( 'Buscar cartel', 'webmoderna' ),
		'not_found'             => __( 'No hay carteles', 'webmoderna' ),
		'not_found_in_trash'    => __( 'No hay carteles en la papelera', 'webmoderna' ),
		'featured_image'        => __( 'Imagen destacada', 'webmoderna' ),
		'set_featured_image'    => __( 'Colocar una imagen destacada', 'webmoderna' ),
		'remove_featured_image' => __( 'Remover una imagen destacada', 'webmoderna' ),
		'use_featured_image'    => __( 'Usar como Imagen destacada', 'webmoderna' ),
		'insert_into_item'      => __( 'Insertar dentro del cartel', 'webmoderna' ),
		'uploaded_to_this_item' => __( 'Cargado en este cartel', 'webmoderna' ),
		'items_list'            => __( 'Listado de los carteles', 'webmoderna' ),
		'items_list_navigation' => __( 'Listado de navegación de carteles', 'webmoderna' ),
		'filter_items_list'     => __( 'Filtrar listado de los carteles', 'webmoderna' ),
	);
	$args = array(
		'label'                 => __( 'Cartel', 'webmoderna' ),
		'description'           => __( 'Carteles de la home', 'webmoderna' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-exerpt-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'carteles_post_type', $args );

}
add_action( 'init', 'carteles_home', 0 );

;?>