<?php
/**
* header.php
* @package WordPress
* @subpackage webmoderna
* @since webmoderna 3.0
* Text Domain: webmoderna
*/

// Variables útiles
$meta_description = of_get_option('meta_description', '');
$meta_keywords = of_get_option('meta_keywords2', '');
$webmoderna_meta_keywords = rwmb_meta('webmoderna_meta_keywords', '');
$webmoderna_meta_descripcion = rwmb_meta('webmoderna_meta_descripcion', '');
$meta_paginas_meta_descripcion = rwmb_meta('meta_paginas_meta_descripcion', '');
$meta_paginas_meta_keywords = rwmb_meta('meta_paginas_meta_keywords', '');
$facebook_contact = of_get_option('facebook_contact', '');
$twitter_contact  = of_get_option('twitter_contact', '');
?>

<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.5, user-scalable=yes" />

<!-- Condidionales del título, descripción y las metakeywords -->
<?php if ( is_home() || is_search() ) { ?>

	<title><?php bloginfo('name');?></title>
	<meta property="og:title" content="<?php bloginfo('name');?>" />
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri() . '/img/webmoderna_social.png';?>" />
<?php
	if ( $meta_description )
	{
		echo '<meta name="description" content="' . $meta_description . '" />';
		echo '<meta property="og:description" content="' . $meta_description . '" />';
	}
	else
	{
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />';
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />';
	};

	if ( $meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_keywords . '" />';
	}

} elseif ( is_404() ) { ?>
	<title>Error 404 - <?php bloginfo('name');?></title>
	<meta property="og:title" content="Error 404 - <?php bloginfo('name');?>" />
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri() . '/img/webmoderna_social.png';?>" />
<?php
	if ( $meta_description )
	{
		echo '<meta name="description" content="' . $meta_description . '" />';
		echo '<meta property="og:description" content="' . $meta_description . '" />';
	}
	else
	{
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />';
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />';
	};

	if ( $meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_keywords . '" />';
	}

} elseif ( is_category() || is_tax() || is_tag() ) { ?>
	<title><?php printf( __( '%s', 'webmoderna' ), single_cat_title( '', false ) ); ?> - <?php bloginfo('name');?></title>
	<meta property="og:title" content="<?php printf( __( '%s', 'webmoderna' ), single_cat_title( '', false ) ); ?> - <?php bloginfo('name');?>" />
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri() . '/img/webmoderna_social.png';?>" />
<?php
	if ( $meta_description )
	{
		echo '<meta name="description" content="' . $meta_description . '" />';
		echo '<meta property="og:description" content="' . $meta_description . '" />';
	}
	else
	{
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />';
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />';
	};

	if ( $meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_keywords . '" />';
	}

} elseif ( is_page() || is_single() ) { ?>
	<title><?php the_title();?> - <?php bloginfo('name');?></title>
	<meta property="og:title" content="<?php the_title();?> - <?php bloginfo('name');?>" />
	<meta property="og:image" content="<?php
		$optional_size	= 'custom-thumb-300-300';
		$img_id			= get_post_thumbnail_id( $post->ID );
		$image			= wp_get_attachment_image_src( $img_id, $optional_size );
		$alt_text		= get_post_meta( $img_id , '_wp_attachment_image_alt', true );
		$perm			= get_permalink ($post->ID );

		if ( $image )
		{
			echo $image[0];
		}
		else
		{
			echo get_stylesheet_directory_uri() . '/img/webmoderna_social.png';
		}
;?>
	" />
<?php
	if ( $meta_paginas_meta_descripcion )
	{
		echo '<meta name="description" content="' . $meta_paginas_meta_descripcion . '" />';
		echo '<meta property="og:description" content="' . $meta_paginas_meta_descripcion . '" />';
	}
	elseif ( $meta_description )
	{
		echo '<meta name="description" content="' . $meta_description . '" />';
		echo '<meta property="og:description" content="' . $meta_description . '" />';
	}
	else
	{
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />';
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />';
	};

	if ( $meta_paginas_meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_paginas_meta_keywords . '" />';
	}
	elseif ( $meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_keywords . '" />';
	}
};?>
	<meta name="author" content="<?php bloginfo('name');?>">

<?php if ( wpmd_is_notphone() ) { ?>
<!--[if lt IE 9]>
	<script type="text/javascript">
		document.createElement("nav");
		document.createElement("header");
		document.createElement("footer");
		document.createElement("section");
		document.createElement("article");
		document.createElement("aside");
		document.createElement("main");
	</script>
<![endif]-->

<!--[if IE 8]>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/html5-3.6-respond-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/selectivizr-min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/css3-mediaqueries.js"></script>
<![endif]-->

<!--[if IE 9]><style type="text/css">.gradient { filter: none !important; }</style><![endif]-->
<!--[if gt IE 9]><style type="text/css">.gradient { filter: none !important; }</style><![endif]-->
<?php };?>

	<link rel="preload" href="<?php bloginfo('stylesheet_directory');?>/css/style.css" as="style" onload="this.rel='stylesheet'" />
	<noscript><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/style.css" /></noscript>

<?php
	// Con esta librería se logran cargar los estilos en forma asincrónica
	echo '<script type="text/javascript">';
	require_once "js/loadcss.js";
	echo '</script>';
;?>

	<script type="text/javascript" id="loadcss">
	loadCSS( "<?php bloginfo('stylesheet_directory');?>/css/style.css", document.getElementById( "loadcss" ) );
	</script>

	<!-- Los favicones -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory');?>/img/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-16x16.png" sizes="16x16" />
	<?php wp_head();?>
</head>
<body>
	<div class="wrapper">
		<header class="heading">

			<!-- Logotipo -->
			<div class="heading__logo">
				<figure class="heading__logo__figure">
					<a href="<?php echo get_home_url();?>" title="<?php bloginfo('name');?>">
						<img
							src="<?php bloginfo('stylesheet_directory');?>/img/logo_200w.png" 
							alt="<?php bloginfo('name');?>"
							srcset="<?php bloginfo('stylesheet_directory');?>/img/logo_200w.png 200w, <?php bloginfo('stylesheet_directory');?>/img/logo_400w.png 400w, <?php bloginfo('stylesheet_directory');?>/img/logo_600w.png 600w"
							sizes="(max-width: 200px) 100vw, 200px"
						/>
					</a>
				</figure>
			</div>

			<!-- Botón del menú -->
			<div class="heading__menu">
				<a id="boton_menu" href="#" class="heading__menu_boton icon-menu icon-right icon-left"></a>
			</div>


			<!-- Barra de navegación -->
			<nav class="nav">
				<?php $default = array(
					'container'			=>	false,
					'depth'				=>	2,
					'menu'				=>	'header_nav',
					'theme_location'	=>	'header_nav',
					'items_wrap'		=>	'<ul class="nav__list">%3$s</ul>'
				);
				wp_nav_menu($default);?>
			</nav>

		<?php
		// El titular principal h1 solo en la home, en el resto de las páginas será un h2
		if( is_home() ) { ?>
			<h1 class="heading__title">
				<?php bloginfo("description");?>
			</h1>
		<?php } else { ?>
			<h2 class="heading__title">
				<?php bloginfo("description");?>
			</h2>
		<?php } ?>
		</header>