<?php
/* sidebar.php
* @package WordPress
* @subpackage webmoderna
* @since webmoderna 3.0
* Text Domain: webmoderna
*/
?>
<!-- La barra Lateral -->
		<div class="sidebar">
			<aside>
				<?php

					// Acá van las cuatro sidebar del footer.
					$telefono_fijo		=	of_get_option( 'telefono_fijo', '' );
					$telefono_celular	=	of_get_option( 'telefono_celular', '' );
					$direccion_web		=	of_get_option( 'direccion_web', '' );
					$skype_contact		=	of_get_option( 'skype_contact', '');
					$email_contact		=	of_get_option( 'email_contact', '' );

				?>
				<section class="sidebar__section">
					<header class="sidebar__section__header">
						<h3 class="sidebar__section__header__title">
							<?php _e('Buscar', 'webmoderna');?>
						</h3>
					</header>
					<article class="sidebar__section__article">
						<form method="get" id="searchform" action="<?php echo home_url();?>">
							<div class="search">
								<input type="search" name="s" id="s" value="<?php the_search_query();?>" placeholder="..." />
								<button type="submit">
									<span class="icon-search"></span>
								</button>
								<div class="clearboth"></div>
							</div>
						</form>
					</article>
				</section>

				<section class="sidebar__section">
					<header class="sidebar__section__header">
						<h3 class="sidebar__section__header__title">
							<?php _e('Contáctenos', 'webmoderna');?>
						</h3>
					</header>
					<article class="sidebar__section__article">
						<address>
							<?php if ( $direccion_web )
							{
								echo $direccion_web;
							};?>
						</address>
					</article>
				</section>

				<section class="sidebar__section">
					<header class="sidebar__section__header">
						<h3 class="sidebar__section__header__title">
							<?php _e('Proyectos y artículos publicados', 'webmoderna');?>
						</h3>
					</header>
					<div class="sidebar__section__article">

<?php // Entradas recientes pero randomizadas

// WP_Query arguments
$args = array (
	'post_type'              => array( 'post' ),
	'nopaging'               => false,
	'orderby'                => 'rand',
	'posts_per_page'		=> 4,
);

// The Query
$entradas = new WP_Query( $args );

// The Loop
if ( $entradas->have_posts() ) {
	while ( $entradas->have_posts() ) {
		$entradas->the_post(); ?>

						<article class="sidebar__section__article__post">
							<div class="sidebar__section__article__content-left">
								<figure class="sidebar__section__article__figure">
									<a href="<?php the_permalink();?>">
										<?php if( has_post_thumbnail() )
										{
											the_post_thumbnail('thumbnail');
										}
										else
										{
											echo '<img src="' . get_stylesheet_directory_uri() . '/img/client.jpg" alt="imagen" />';
										}?>
									</a>
								</figure>
							</div>
							<div class="sidebar__section__article__content-right">
								<h4 class="sidebar__section__article__subtitle">
									<a href="<?php the_permalink();?>"><?php echo titulo_corto('...', 50);?></a>
								</h4>
								<div class="sidebar__section__article__fecha">
									<span class="icon-calendar icon-right"></span><?php echo get_the_date();?>
								</div>
							</div>
						</article>

<?php	}
} else {
	// no posts found ?>
						
						<article class="sidebar__section__article__post">
							<div class="sidebar__section__article__content-left">
								<figure class="sidebar__section__article__figure">
									<a href="#">
										<img src="<?php bloginfo('stylesheet_directory');?>/img/client.jpg" alt="imagen" />
									</a>
								</figure>
							</div>
							<div class="sidebar__section__article__content-right">
								<h4 class="sidebar__section__article__subtitle"><a href="#">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</a></h4>
							</div>
						</article>

<?php }

// Restore original Post Data
wp_reset_postdata();?>
					</div>
				</section>

				<?php dynamic_sidebar('sidebar_right');?>
			</aside>
		</div>