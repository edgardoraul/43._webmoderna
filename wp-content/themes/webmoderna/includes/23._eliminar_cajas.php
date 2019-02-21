<?php
// Eliminar cajas innecesarias del dashboard

// Quitar cajas del escritorio
function quita_cajas_escritorio()
{
	// if( !current_user_can('manage_options') )
	// {
		remove_meta_box('dashboard_activity', 'dashboard', 'normal' ); // Actividad
		remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Ahoramismo
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Comentarios recientes
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Enlaces entrantes
		remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
		remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Publicación rápida
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Borradores recientes
		remove_meta_box('dashboard_primary', 'dashboard', 'side');   // Noticas del blog de WordPress
		remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Otras noticias de WordPress
	// utiliza 'dashboard-network' como segundo parámetro para quitar cajas del escritorio de red.
	// }
}
add_action('wp_dashboard_setup', 'quita_cajas_escritorio' );

// Removiendo el panel de bienvenida del wordpress
remove_action('welcome_panel', 'wp_welcome_panel');


// remove unnecessary page/post meta boxes
function remove_meta_boxes()
{

	// posts
	remove_meta_box('postcustom','post','normal');
	remove_meta_box('trackbacksdiv','post','normal');
	remove_meta_box('commentstatusdiv','post','normal');
	remove_meta_box('commentsdiv','post','normal');
	// remove_meta_box('categorydiv','post','normal');
	// remove_meta_box('tagsdiv-post_tag','post','normal');
	remove_meta_box('slugdiv','post','normal');
	remove_meta_box('authordiv','post','normal');
	remove_meta_box('postexcerpt','post','normal');
	remove_meta_box('revisionsdiv','post','normal');

	// pages
	remove_meta_box('postcustom','page','normal');
	remove_meta_box('commentstatusdiv','page','normal');
	remove_meta_box('trackbacksdiv','page','normal');
	remove_meta_box('commentsdiv','page','normal');
	remove_meta_box('slugdiv','page','normal');
	remove_meta_box('authordiv','page','normal');
	remove_meta_box('revisionsdiv','page','normal');
	remove_meta_box('postexcerpt','page','normal');
}
add_action('admin_init','remove_meta_boxes');
?>