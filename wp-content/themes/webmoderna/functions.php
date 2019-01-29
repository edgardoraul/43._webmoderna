<?php
/**
* functions.php
* @package WordPress
* @subpackage webmoderna
* @since webmoderna 3.0
*/

// Campos adicionales al perfil de usuario
// require_once "includes/22._perfil_usuario.php";

// Login y Captcha
require_once "includes/01._login.php";
// require_once "includes/dm-confirm-email/dm-confirm-email.php";

// Detección de móviles.
require_once "includes/02._wp-mobile-detect.php";

// Configuración del slider
require_once "includes/03._el_slider.php";

// Regenerar los thumbnails
require_once "includes/04._regenerate-thumbnails.php";

// Cargar Panel de Opciones
if ( !function_exists( 'optionsframework_init' ) )
{
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/includes/' );
	require_once dirname( __FILE__ ) . '/includes/05._options-framework.php';
}

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function()
{
	jQuery('#example_showhidden').click(function()
	{
		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined)
	{
		jQuery('#section-example_text_hidden').show();
	}
});
</script>

<?php
}

// Sitemap en xml
require_once "includes/06._sitemap.php";

// Agregar el sidebar con widgets
require_once "includes/07._sidebar.php";

// Inclusión de soporte para metaboxes
require_once "includes/08._configuracion_metabox.php";
require_once "includes/meta-box/meta-box.php";

// Las thumbnails
require_once "includes/09._thumbnails.php";

// Las miquitas de pan
require_once "includes/10._breadcrums.php";

// Paginación
require_once "includes/11._paginacion.php";

// Calendario de Reservas
// require_once "includes/12._calendario_reservas.php";

// Formulario de registro de usuarios
// require_once "includes/13._registro_usuarios.php";

// Url a relativas para testeo
require_once "includes/14._url_relativas.php";

// Equipo de Trabajo
// require_once "includes/15._equipo_trabajo.php";

// Minificación del html
// require_once "includes/20._minificacion.php";

// Carteles de la Home
require_once "includes/21._testimonios.php";


// Eliminar cajas innecesarias del Dashboard
require_once "includes/23._eliminar_cajas.php";

// Avatar personalizado
if ( ! function_exists('avatar_webmoderna') )
{
	function avatar_webmoderna( $avatar_defaults )
	{
		$myavatar = get_stylesheet_directory_uri() . '/img/apple-touch-icon-152x152.png';
		$avatar_defaults[$myavatar] = 'WebModerna Avatar';
		return $avatar_defaults;
	}
	add_filter( 'avatar_defaults', 'avatar_webmoderna' );
}
// require_once "includes/24._avatar.php";

// Metas para redes sociales
// require_once "includes/25._meta_sociales.php";

// Permitir a los suscriptores poder subir fotos
/*if ( current_user_can( 'subscriber' ) && !current_user_can( 'upload_files' ) )
{
	add_action( 'admin_init', 'allow_subscriber_uploads' );
}
function allow_subscriber_uploads()
{
	$subscriber = get_role( 'subscriber' );
	$subscriber->add_cap( 'upload_files' );
}*/


// Soporte para html5
function custom_theme_features()
{
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
}
add_action( 'after_setup_theme', 'custom_theme_features' );

// Más etiquetas html en el editor de contenido
function cambiar_opciones_mce($initArray)
{
	$ext = 'pre[id|name|class|style],iframe[align|longdesc| name|width|height|frameborder|scrolling|marginheight| marginwidth|src]';

	if ( isset( $initArray['extended_valid_elements'] ) )
	{
		$initArray['extended_valid_elements'] .= ',' . $ext;
	}
	else
	{
		$initArray['extended_valid_elements'] = $ext;
	}
	return $initArray;
}
add_filter('tiny_mce_before_init', 'cambiar_opciones_mce');


// Deshabilitar Iconos Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
add_filter( 'emoji_svg_url', '__return_false' );

// Remover la API REST
function remove_api ()
{
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}
add_action( 'after_setup_theme', 'remove_api' );

// Remover cosas raras de Wordpress
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action( 'wp_head', 'dns-prefetch' );

/*// Remover los rel="wp-att de las imágenes"
function my_remove_rel_attr($content) {
	return preg_replace('/\s+rel="attachment wp-att-[0-9]+"/i', '', $content);
}
add_filter('the_content', 'my_remove_rel_attr');
*/


// Agregando un favicon al área de administración
function admin_favicon()
{
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_bloginfo('stylesheet_directory') . '/img/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon', 1);


// Deshabilitar el mensaje de actualización del WordPress
add_action( 'admin_head', 'ocultar_aviso_actualizacion', 1 );
function ocultar_aviso_actualizacion()
{
	if ( !current_user_can( 'update_core' ) )
	{
		remove_action( 'admin_notices', 'update_nag', 3 );
	}
}


// Agregar clases a los enlaces de los posts next y back
function add_class_next_post_link($html)
{
	$html = str_replace('<a','<a title="'.__('Siguiente', 'webmoderna').'" ', $html);
	return $html;
}
add_filter('next_post_link','add_class_next_post_link', 10, 1);
function add_class_previous_post_link($html)
{
	$html = str_replace('<a','<a title="'.__('Anterior', 'webmoderna').'" ', $html);
	return $html;
}
add_filter('previous_post_link','add_class_previous_post_link', 10, 1);


// Permitir comentarios encadenados
function enable_threaded_comments()
{
	if( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) )
	{
		wp_enqueue_script('comment-reply');
	}
};
add_action( 'get_header','enable_threaded_comments', 1 );


// Desactivar el código HTML en los comentarios
// add_filter('pre_comment_content', 'wp_specialchars');


// Remover clases automáticas del the_post_thumbnail
function the_post_thumbnail_remove_class( $output )
{
	$output = preg_replace( '/class=".*?"/', '', $output );
	return $output;
}
add_filter( 'post_thumbnail_html', 'the_post_thumbnail_remove_class'  );


// Remover atributos de ancho y alto de las imágenes insertadas
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to__ditor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html )
{
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	return $html;
};

// Desactivar el script de embebidos
function my_deregister_scripts()
{
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

// Añadiendo cabeceras de seguridad
function add_security_headers()
{
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'X-XSS-Protection: 1;mode=block' );
}
add_action( 'send_headers', 'add_security_headers' );

// Cambiar el logo del login y la url del mismo y el título
function custom_login_logo()
{
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/img/favicon.ico" />';
	echo '<style type="text/css">
		body.login
		{
			background: #312720 !important;
			height: 100% !important;
			height: 100vw !important;
		}
		h1
		{
			padding-top: 20px !important;
		}
		h1 a
		{
			background:  #594A42 url(' . get_bloginfo('stylesheet_directory') . '/img/logo2.png) center center no-repeat !important;
			background-size: 90% !important;
			border: 1px solid #594A42;
			height: 100px !important;
			overflow: hidden !important;
			width: 320px !important;
		}
		div#login
		{
			padding: 0 !important;
		}
		.message, #loginform, h1 a
		{
			border-radius: 5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		}
		</style>';
};
add_action( 'login_head', 'custom_login_logo', 1 );
function the_url( $url )
{
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'the_url' );
function change_wp_login_title()
{
	return get_option('blogname');
}
add_filter( 'login_headertitle', 'change_wp_login_title' );


// Permitir svg en las imágenes para cargar.
function cc_mime_types( $mimes )
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


// Deshabilitar la edición desde otros programas, el link corto y la versión del WP.
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link', 1);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links__xtra', 3);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');

// Renombramiento de la sección de Categorías y Etiquetas
/*function revcon_change_post_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'Propiedades';
	$submenu['edit.php'][5][0] = 'Todas las Propiedades';
	$submenu['edit.php'][10][0] = 'Agregar Propiedades';
	$submenu['edit.php'][15][0] = 'Tipos de Propiedades'; // Change name for categories
	// $submenu['edit.php'][16][0] = 'Precios de Propiedades'; // Change name for tags
	echo '';
}*/

// Remover clases e ids automáticos de los menúes
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter( $var )
{
	return is_array( $var ) ? array_intersect( $var, array( 'current-menu-item', 'current_page_item' ) ) : '';
};

// Personalizar las palabras del excerpt.
function custom__xcerpt_length( $length )
{
	return 40;
};
add_filter( 'excerpt_length', 'custom__xcerpt_length' );


// Deshabilitar los enlaces automáticos en los comentarios
// remove_filter( 'comment_text', 'make_clickable', 9 );


// Modifica el pie de página del panel de administarción
function remove_footer_admin()
{
	echo _e('Desarrollado por', 'webmoderna') . ' <a title="'.__('WebModerna | el futuro de la web', 'webmoderna') . '" href="http://www.webmoderna.com.ar" target="_blank"> <img title="WebModerna" src="' . get_bloginfo("stylesheet_directory") . '/img/webmoderna.png" width="150" style="display:inline-block;vertical-align:middle;" alt="WebModerna" /></a>';
};
add_filter('admin_footer_text', 'remove_footer_admin');


// Modificar los campos del perfil de usuario de WordPress
function extra_contact_info($contactmethods)
{
	unset($contactmethods['aim']);
	unset($contactmethods['yim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['nicename']);
	$contactmethods['facebook']='Facebook';
	$contactmethods['twitter']='Twitter';
	$contactmethods['skype_contacto']='Skype/Outlook/Hotmail';
	return $contactmethods;
};
add_filter( 'user_contactmethods', 'extra_contact_info' );


// Remover versión del WordPress
function remove_wp_version() { return ''; };
add_filter( 'the_generator', 'remove_wp_version' );


/*// Eliminar el atributo rel="category tag".
function remove_category_list_rel($output)
{
	return str_replace( 'rel="category tag"', '', $output );
};
add_filter( 'wp_list_categories', 'remove_category_list_rel' );
add_filter( 'the_category', 'remove_category_list_rel' );
*/

// Eliminar css y scripts de comentarios cuando no hagan falta
/*function clean_header()
{
	wp_deregister_script( 'comment-reply' );
};
add_action( 'init', 'clean_header', 1 );*/


// Cargar scripts para comentarios solo en single.php
/*function wd_single_scripts()
{
	if( is_singular() )
	{
		// Carga el javascript necesario para los comentarios anidados
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_print_scripts', 'wd_single_scripts', 1);*/


// Registrar las menúes de navegación
register_nav_menus ( array(
	'header_nav'	=>	__( 'Menú Principal', 'webmoderna' )
	)
);

// Agregar nofollow a los enlaces externos
function auto_nofollow( $content )
{
	return preg_replace_callback( '/<a>]+/', 'auto_nofollow_callback', $content );
}
function auto_nofollow_callback( $matches )
{
	$link = $matches[0];
	$site_link = get_bloginfo( 'url' );
	if ( strpos( $link, 'rel' ) === false )
	{
		$link = preg_replace( "%(href=S(?!$site_link))%i", 'rel="nofollow" $1', $link );
	}
	elseif ( preg_match( "%href=S(?!$site_link)%i", $link ) )
	{
		$link = preg_replace( '/rel=S(?!nofollow)S*/i', 'rel="nofollow"', $link );
	}
	return $link;
}
add_filter( 'comment_text', 'auto_nofollow' );


// Habilitar botones de edición avanzados
function habilitar_mas_botones( $buttons )
{
	$buttons[] = 'hr';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	return $buttons;
};
add_filter( "mce_buttons_3", "habilitar_mas_botones" );


// Para hacer posible que esta plantilla pueda cambiar de idioma
load_theme_textdomain( 'webmoderna', TEMPLATEPATH . '/language' );
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/language/$locale.php";
if( is_readable( $locale_file ) ) require_once( $locale_file );


// Detén las adivinanzas de URLs de WordPress
add_filter( 'redirect_canonical', 'stop_guessing' );
function stop_guessing( $url )
{
	if( is_404() )
	{
		return false;
	}
	return $url;
}


// Ocultar los errores en la pantalla de Inicio de sesión de WordPress
function no__rrors_please()
{
	return __( '¡Sal de mi jardín! ¡AHORA MISMO!', 'webmoderna' );
};
add_filter( 'login__rrors', 'no__rrors_please' );


// Eliminar palabras cortas de URL
function remove_short_words( $slug )
{
	if ( !is_admin() ) return $slug;
	$slug = explode( '-', $slug );
	foreach  ($slug as $k => $word )
	{
		if ( strlen( $word ) < 3 )
		{
			unset( $slug[$k] );
		}
	}
	return implode( '-', $slug );
};
add_filter( 'sanitize_title', 'remove_short_words' );

// Agregar una clase a los menús
function add_classes_wpse( $classes, $item, $args )
{
	$classes[] = 'nav__list__items';
	return $classes;
}
add_filter( 'nav_menu_css_class','add_classes_wpse', 1, 3 );


// Acortar títulos en todos los posts en el momento de la carga
function titulolargo( $title )
{
	global $post;
	$title = $post->post_title;
	if ( str_word_count( $title ) >= 12 ) //aqui definimos el máximo de palabras permitidas
	wp_die( __( 'Error: tu título sobrepasa el máximo de palabras razonable, vuelve atrás y mejóralo, tus lectores te lo agradecerán.', 'webmoderna' ) );
}
add_action( 'publish_post', 'titulolargo' );

//Acortando títulos por caracteres
function titulo_corto( $after = null, $length )
{
	$mytitle = get_the_title();
	$size = strlen( $mytitle );
	if( $size > $length )
	{
		$mytitle = substr( $mytitle, 0, $length );
		$mytitle = explode( ' ', $mytitle );
		array_pop( $mytitle );
		$mytitle = implode( " ", $mytitle ) . $after;
	}
	return $mytitle;
}


// Implementación de un walker para el menú del home
/*
class Primary_Walker_Nav_Menu extends Walker_Nav_Menu
{
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
	{
		if ( array_search( 'menu-item-has-children', $item->classes ) )
		{
			$output .= sprintf( "\n<li class='dropdown %s'><a href='%s' class=\"dropdown-toggle\" data-toggle=\"dropdown\" >%s</a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->url, $item->title );
		}
		else
		{
			$output .= sprintf( "\n<li %s><a href='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes) ) ? ' class="active"' : '', $item->url, $item->title );
		}
	}

	function start_lvl( &$output, $depth )
	{
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"dropdown-menu\" role=\"menu\">\n";
	}
}
*/


?>