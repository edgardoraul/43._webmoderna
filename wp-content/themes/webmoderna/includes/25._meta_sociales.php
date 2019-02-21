<?php
function insert_social_networks_meta_in_head()
{
	// variables
	// global $post;
	$facebook_contact = of_get_option('facebook_contact', '');
	$twitter_contact  = of_get_option('twitter_contact', '');
	$emyth_meta_descripcion = rwmb_meta('emyth_meta_descripcion', '');
	$meta_paginas_meta_descripcion = rwmb_meta('meta_paginas_meta_descripcion', '');

	if( is_single() )
	{
		// G+
		echo '<meta itemprop="name" content="' . get_the_title() . '" />';
		echo '<meta itemprop="description" content="' . $emyth_meta_descripcion . '" />';

		// Twitter
		echo '<meta name="twitter:card" content="summary_large_image" />';
		echo '<meta name="twitter:site" content="' . get_bloginfo('name') . '" />';
		echo '<meta name="twitter:title" content="' . get_the_title() . '" />';
		echo '<meta name="twitter:description" content="' . $emyth_meta_descripcion . '" />';
		echo '<meta name="twitter:creator" content="' . $twitter_contact . '" />';

		// Facebook
		echo '<meta property="fb:admins" content="' . $facebook_contact . '"/>';
		echo '<meta property="og:title" content="' . get_the_title() . '" />';
		echo '<meta property="og:type" content="article" />';
		echo '<meta property="og:url" content="' . get_permalink() . '" />';
		echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
		echo '<meta property="og:description" content="' . $emyth_meta_descripcion . '" />';

		if( !has_post_thumbnail() )
		{
			// use a default image
			$default_image = get_stylesheet_directory_uri() . "/img/logo.png";
			echo '<meta property="og:image" content="' . $default_image . '"/>';
			echo '<meta itemprop="image" content="' . $default_image . '"/>';
		}
		else
		{
			$thumb_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			echo '<meta property="og:image" content="' . str_replace(' ', '%20', $thumb_src[0] ) . '"/>';
			// echo '<meta itemprop="image" content="' . str_replace(' ', '%20', $thumb_src[0] ) . '"/>';
		}
		echo "";
		
	}
	elseif ( is_page() )
	{
		// G+
		// echo '<meta itemprop="name" content="' . get_the_title() . '" />';
		// echo '<meta itemprop="description" content="' . $meta_paginas_meta_descripcion . '" />';

		// Twitter
		echo '<meta name="twitter:card" content="summary_large_image" />';
		echo '<meta name="twitter:site" content="' . get_bloginfo('name') . '" />';
		echo '<meta name="twitter:title" content="' . get_the_title() . '" />';
		echo '<meta name="twitter:description" content="' . $meta_paginas_meta_descripcion . '" />';
		echo '<meta name="twitter:creator" content="' . $twitter_contact . '" />';

		// Facebook
		echo '<meta property="fb:admins" content="' . $facebook_contact . '"/>';
		echo '<meta property="og:title" content="' . get_the_title() . '" />';
		echo '<meta property="og:type" content="article" />';
		echo '<meta property="og:url" content="' . get_permalink() . '" />';
		echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
		echo '<meta property="og:description" content="' . $meta_paginas_meta_descripcion . '" />';

		if( !has_post_thumbnail() )
		{
			// use a default image
			$default_image = get_stylesheet_directory_uri() . "/img/logo.png";
			echo '<meta property="og:image" content="' . $default_image . '"/>';
			// echo '<meta itemprop="image" content="' . $default_image . '"/>';
		}
		else
		{
			$thumb_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			echo '<meta property="og:image" content="' . str_replace(' ', '%20', $thumb_src[0] ) . '"/>';
			// echo '<meta itemprop="image" content="' . str_replace(' ', '%20', $thumb_src[0] ) . '"/>';
		}
		echo "";
	}
	else
	{
		// G+
		// echo '<meta itemprop="name" content="' . get_the_title() . '" />';
		// echo '<meta itemprop="description" content="' . get_bloginfo( 'description' ) . '" />';

		// Twitter
		echo '<meta name="twitter:card" content="summary_large_image" />';
		echo '<meta name="twitter:site" content="' . get_bloginfo('name') . '" />';
		echo '<meta name="twitter:title" content="' . get_the_title() . '" />';
		echo '<meta name="twitter:description" content="' . get_bloginfo( 'description' ) . '" />';
		echo '<meta name="twitter:creator" content="' . $twitter_contact . '" />';

		// Facebook
		echo '<meta property="fb:admins" content="' . $facebook_contact . '"/>';
		echo '<meta property="og:title" content="' . get_the_title() . '" />';
		echo '<meta property="og:type" content="article" />';
		echo '<meta property="og:url" content="' . get_permalink() . '" />';
		echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>';
		echo '<meta property="og:description" content="' . get_bloginfo( 'description' ) . '" />';

		if( !has_post_thumbnail() )
		{
			// use a default image
			$default_image = get_stylesheet_directory_uri() . "/img/logo.png";
			echo '<meta property="og:image" content="' . $default_image . '"/>';
			// echo '<meta itemprop="image" content="' . $default_image . '"/>';
		}
		else
		{
			$thumb_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			echo '<meta property="og:image" content="' . str_replace(' ', '%20', $thumb_src[0] ) . '"/>';
			// echo '<meta itemprop="image" content="' . str_replace(' ', '%20', $thumb_src[0] ) . '"/>';
		}
		echo "";
	}

}
add_action( 'wp_head', 'insert_social_networks_meta_in_head', 5 );
?>