<?php
// Equipo de Trabajo
function team() {

	$labels = array(
		'name'                  => _x( 'Integrantes', 'Post Type General Name', 'emyth' ),
		'singular_name'         => _x( 'Equipo', 'Post Type Singular Name', 'emyth' ),
		'menu_name'             => __( 'Equipo de Trabajo', 'emyth' ),
		'name_admin_bar'        => __( 'Equipo de Trabajo', 'emyth' ),
		'archives'              => __( 'Integrantes', 'emyth' ),
		'parent_item_colon'     => __( 'Integrante superior:', 'emyth' ),
		'all_items'             => __( 'Todos los integrantes', 'emyth' ),
		'add_new_item'          => __( 'Agregar un nuevo integrante', 'emyth' ),
		'add_new'               => __( 'Agregar uno nuevo', 'emyth' ),
		'new_item'              => __( 'Nuevo integrante del equipo', 'emyth' ),
		'edit_item'             => __( 'Editar al integrante', 'emyth' ),
		'update_item'           => __( 'Actualizar al integrante del equipo', 'emyth' ),
		'view_item'             => __( 'Ver Integrante', 'emyth' ),
		'search_items'          => __( 'Buscar integrantes', 'emyth' ),
		'not_found'             => __( 'No hay integrentes. Está vacío.', 'emyth' ),
		'not_found_in_trash'    => __( 'Vacío', 'emyth' ),
		'featured_image'        => __( 'Foto destacada', 'emyth' ),
		'set_featured_image'    => __( 'Colocar una foto destacada del integrante', 'emyth' ),
		'remove_featured_image' => __( 'Remover la foto', 'emyth' ),
		'use_featured_image'    => __( 'Usar como una foto principal', 'emyth' ),
		'insert_into_item'      => __( 'Insertar dentro del Integrante', 'emyth' ),
		'uploaded_to_this_item' => __( 'Actualizar todo el equipo', 'emyth' ),
		'items_list'            => __( 'Listado del Equipo de trabajo', 'emyth' ),
		'items_list_navigation' => __( 'Navegar por el listado del equipo de trabajo', 'emyth' ),
		'filter_items_list'     => __( 'Filtrar el listado de gente', 'emyth' ),
	);
	$args = array(
		'label'                 => __( 'Equipo', 'emyth' ),
		'description'           => __( 'Nuestro equipo de trabajo', 'emyth' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'query_var'             => '$equipo_trabajo',
		'capability_type'       => 'page',
	);
	register_post_type( 'team_work', $args );
}
add_action( 'init', 'team', 0 );
;?>