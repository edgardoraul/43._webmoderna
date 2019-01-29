<?php
/**
* header.php
* @package WordPress
* @subpackage webmoderna
* @since webmoderna 3.0
* Text Domain: webmoderna
*/
?>

<?php get_header();?>

		<!-- El Slider -->
		<div class="slider slider__home">
			<div id="owl-dos" class="owl-carousel">
		<?php 

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'Sliders' ),
			'order'                  => 'ASC',
			'orderby'                => 'menu_order',
		);

		// The Query
		$sliders_home = new WP_Query( $args );

		// The Loop
		if ( $sliders_home->have_posts() )
		{
			while ( $sliders_home->have_posts() )
			{
				$sliders_home->the_post();?>

				<div class="slider__item">
					<figure>
						<?php
						$optional_size	= 'custom-thumb-600-250';
						$optional_size2	= 'custom-thumb-1200-500';
						$img_id			= get_post_thumbnail_id( $post->ID );
						$image			= wp_get_attachment_image_src( $img_id, $optional_size );
						$image2			= wp_get_attachment_image_src( $img_id, $optional_size2 );
						$alt_text		= get_post_meta( $img_id , '_wp_attachment_image_alt', true );
						$perm			= get_permalink ($post->ID );
						if ( $image )
						{
							if ( wpmd_is_notphone() )
							{
								echo '<img src="#" data-src="' . $image2[0] . '" class="lazyOwl" alt="' . $alt_text . '" />';
							}
							else
							{
								echo '<img src="#" data-src="' . $image[0] . '" class="lazyOwl" alt="' . $alt_text . '" />';
							}
						}
						;?>
					</figure>
					<div class="slider__home__leyenda gradient">
						<?php echo titulo_corto('...', 50);?>
					</div>
				</div>

			<?php	;};
			} else { ?>

				<div class="slider__item">
					<figure>
						<img class="lazyOwl" src="<?php bloginfo('stylesheet_directory');?>/img/slide-2.jpg" alt="imagen" />
					</figure>
					<div class="slider__home__leyenda gradient">
						Algo para decir
					</div>
				</div>
				<div class="slider__item">
					<figure>
						<img class="lazyOwl" src="<?php bloginfo('stylesheet_directory');?>/img/slide-3.jpg" alt="imagen" />
					</figure>
					<div class="slider__home__leyenda gradient">
						Algo para decir
					</div>
				</div>

		<?php	}

		// Restore original Post Data
		wp_reset_postdata();?>

			</div>
		</div><!-- Fin del Slider -->

		
		<!-- Contenido Centrales -->
		<?php // Variables de los Mensajes mensaje_1__imagen@x2
		$mensaje_1__imagen 		= of_get_option('mensaje_1__imagen','');
		$mensaje_1__imagen_x2 	= of_get_option('mensaje_1__imagen_x2','');
		$mensaje_1__titulo 		= of_get_option('mensaje_1__titulo','');
		$mensaje_1__contenido 	= of_get_option('mensaje_1__contenido','');

		$mensaje_2__imagen 		= of_get_option('mensaje_2__imagen','');
		$mensaje_2__imagen_x2 		= of_get_option('mensaje_2__imagen_x2','');
		$mensaje_2__titulo 		= of_get_option('mensaje_2__titulo','');
		$mensaje_2__contenido 	= of_get_option('mensaje_2__contenido','');

		$mensaje_3__imagen 		= of_get_option('mensaje_3__imagen','');
		$mensaje_3__imagen_x2 		= of_get_option('mensaje_3__imagen_x2','');
		$mensaje_3__titulo 		= of_get_option('mensaje_3__titulo','');
		$mensaje_3__contenido 	= of_get_option('mensaje_3__contenido','');

		$mensaje_4__imagen 		= of_get_option('mensaje_4__imagen','');
		$mensaje_4__imagen_x2 		= of_get_option('mensaje_4__imagen_x2','');
		$mensaje_4__titulo 		= of_get_option('mensaje_4__titulo','');
		$mensaje_4__contenido 	= of_get_option('mensaje_4__contenido','');

		?>
		<section class="centrales">
			<article class="centrales__article">
				<figure class="centrales__article__figure">
					<?php if ( $mensaje_1__imagen )
					{
						echo '<img src="' . $mensaje_1__imagen . '" alt="' . $mensaje_1__titulo . 
						'" srcset="' . $mensaje_1__imagen . ' 300w, ' . $mensaje_1__imagen_x2 . ' 600w" sizes="(max-width: 300px) 100vw, 300px" />';

					}
					else
					{
						echo '<img src="' . get_stylesheet_directory_uri() . '/img/client.jpg" alt="imagen" />';
					};?>
				</figure>
				<header class="centrales__article__header">
					<h2 class="centrales__article__header__title">
						<?php if ( $mensaje_1__titulo )
						{
							echo $mensaje_1__titulo;
						}
						else
						{
							echo 'Algún titular como para rellenar';
						};?>
					</h2>
				</header>
				<div class="centrales__article__content">
					<?php if ( $mensaje_1__contenido )
					{
						echo $mensaje_1__contenido;
					}
					else
					{
						echo '<ul>
							<li>Un buen<strong><em> gran listado pequeño</em></strong> gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
						</ul>';
					};?>
					
				</div>
			</article>

			<article class="centrales__article">
				<figure class="centrales__article__figure">
					<?php if ( $mensaje_2__imagen )
					{
						echo '<img src="' . $mensaje_2__imagen . '" alt="' . $mensaje_2__titulo . 
						'" srcset="' . $mensaje_2__imagen . ' 300w, ' . $mensaje_2__imagen_x2 . ' 600w" sizes="(max-width: 300px) 100vw, 300px" />';
					}
					else
					{
						echo '<img src="' . get_stylesheet_directory_uri() . '/img/client.jpg" alt="imagen" />';
					};?>
				</figure>
				<header class="centrales__article__header">
					<h2 class="centrales__article__header__title">
						<?php if ( $mensaje_2__titulo )
						{
							echo $mensaje_2__titulo;
						}
						else
						{
							echo 'Algún titular como para rellenar';
						};?>
					</h2>
				</header>
				<div class="centrales__article__content">
					<?php if ( $mensaje_2__contenido )
					{
						echo $mensaje_2__contenido;
					}
					else
					{
						echo '<ul>
							<li>Un buen<strong><em> gran listado pequeño</em></strong> gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
						</ul>';
					};?>
					
				</div>
			</article>

			<article class="centrales__article">
				<figure class="centrales__article__figure">
					<?php if ( $mensaje_3__imagen )
					{
						echo '<img src="' . $mensaje_3__imagen . '" alt="' . $mensaje_3__titulo . 
						'" srcset="' . $mensaje_3__imagen . ' 300w, ' . $mensaje_3__imagen_x2 . ' 600w" sizes="(max-width: 300px) 100vw, 300px" />';
					}
					else
					{
						echo '<img src="' . get_stylesheet_directory_uri() . '/img/client.jpg" alt="imagen" />';
					};?>
				</figure>
				<header class="centrales__article__header">
					<h2 class="centrales__article__header__title">
						<?php if ( $mensaje_3__titulo )
						{
							echo $mensaje_3__titulo;
						}
						else
						{
							echo 'Algún titular como para rellenar';
						};?>
					</h2>
				</header>
				<div class="centrales__article__content">
					<?php if ( $mensaje_3__contenido )
					{
						echo $mensaje_3__contenido;
					}
					else
					{
						echo '<ul>
							<li>Un buen<strong><em> gran listado pequeño</em></strong> gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
						</ul>';
					};?>
					
				</div>
			</article>

			<?php // Condicionamos para que el último mensaje aparezca si se carga una imagen
			if( $mensaje_4__imagen ) { ?>
			<article class="centrales__article">
				<figure class="centrales__article__figure">
					<?php if ( $mensaje_4__imagen )
					{
						echo '<img src="' . $mensaje_4__imagen . '" alt="' . $mensaje_4__titulo . 
						'" srcset="' . $mensaje_4__imagen . ' 300w, ' . $mensaje_4__imagen_x2 . ' 600w" sizes="(max-width: 300px) 100vw, 300px" />';
					}
					else
					{
						echo '<img src="' . get_stylesheet_directory_uri() . '/img/client.jpg" alt="imagen" />';
					};?>
				</figure>
				<header class="centrales__article__header">
					<h2 class="centrales__article__header__title">
						<?php if ( $mensaje_4__titulo )
						{
							echo $mensaje_4__titulo;
						}
						else
						{
							echo 'Algún titular como para rellenar';
						};?>
					</h2>
				</header>
				<div class="centrales__article__content">
					<?php if ( $mensaje_4__contenido )
					{
						echo $mensaje_4__contenido;
					}
					else
					{
						echo '<ul>
							<li>Un buen<strong><em> gran listado pequeño</em></strong> gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
							<li>Un pequeño gran listado pequeño gran listado pequeño gran listado</li>
						</ul>';
					};?>
					
				</div>
			</article>
			<?php };?>
		</section>

		<div class="clearboth"></div>

		<!-- La parte principal de la web -->
		<div class="content">
			<main>

				<!-- Los Artículos Cruzados -->
				<section class="cruzados">

<?php

// WP_Query arguments
$args = array (
	'post_type'              => array( 'carteles_post_type' ),
	'order'                  => 'ASC',
);

// The Query
$carteles_home = new WP_Query( $args );

// The Loop
if ( $carteles_home->have_posts() )
{
	while ( $carteles_home->have_posts() )
	{
		$carteles_home->the_post();?>

					<article class="cruzados__article">
						<figure class="cruzados__article__figure">
							<?php the_post_thumbnail('custom-thumb-400-300');?>
						</figure>
						<div class="cruzados__article__content">
							<header class="cruzados__article__content__header">
								<h2 class="cruzados__article__content__header__title">
									<?php
									// <a href="#" class="cruzados__article__content__header__title_a">
									echo titulo_corto('...', 50);
									// </a>
									?>
								</h2>
							</header>
							<?php the_content();?>
						</div>
					</article>

<?php	}
} else { ?>

					<article class="cruzados__article">
						<figure class="cruzados__article__figure">
							<a href="#" class="cruzados__article__figure_a">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/p3.jpg" alt="Imagen" />
							</a>
						</figure>
						<div class="cruzados__article__content">
							<header class="cruzados__article__content__header">
								<h2 class="cruzados__article__content__header__title">
									<a href="#" class="cruzados__article__content__header__title_a">
										Un gran titular como par poder algo
									</a>
								</h2>
							</header>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente sunt non expedita asperiores? Maiores corporis iure, ipsam impedit vero expedita ea recusandae deserunt libero praesentium, rerum. Consequatur nesciunt expedita possimus.</p>
							<a href="#" class="icon-add icon-left icon-right"></a>
						</div>
					</article>

					<article class="cruzados__article">
						<figure class="cruzados__article__figure">
							<a href="#" class="cruzados__article__figure_a">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/p3.jpg" alt="Imagen" />
							</a>
						</figure>
						<div class="cruzados__article__content">
							<header class="cruzados__article__content__header">
								<h2 class="cruzados__article__content__header__title">
									<a href="#" class="cruzados__article__content__header__title_a">
										Un gran titular como par poder algo
									</a>
								</h2>
							</header>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente sunt non expedita asperiores? Maiores corporis iure, ipsam impedit vero expedita ea recusandae deserunt libero praesentium, rerum. Consequatur nesciunt expedita possimus.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente sunt non expedita asperiores? Maiores corporis iure, ipsam impedit vero expedita ea recusandae deserunt libero praesentium, rerum. Consequatur nesciunt expedita possimus.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente sunt non expedita asperiores? Maiores corporis iure, ipsam impedit vero expedita ea recusandae deserunt libero praesentium, rerum. Consequatur nesciunt expedita possimus.</p>
						</div>
					</article>
<?php }

// Restore original Post Data
wp_reset_postdata();
?>
				</section>
			</main>
		</div>

		<!-- La barra Lateral -->
		<?php get_sidebar();?>

		<!-- El Slider -->
		<div class="slider">
		<?php // Variables
		$portfolio_home = of_get_option('portfolio_home','');
		$contenido_portfolio_home = of_get_option('contenido_portfolio_home',''); ?>
			<aside>
				<header class="slider__header">
					<h2 class="slider__header__title">
						<?php if ( $portfolio_home )
						{
							echo $portfolio_home;
						} 
						else 
						{
							echo 'Titular ejemplo...';
						}?>
					</h2>
					<blockquote>
						<?php if ( $contenido_portfolio_home )
						{
							echo $contenido_portfolio_home;
						}
						else
						{
							echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente sunt non expedita asperiores? Maiores corporis iure, ipsam.';
						}?>
					</blockquote>
				</header>
			    <div id="owl-uno" class="owl-carousel slider__secundario">
		<?php 
		// ========================== El loop del slider ========================

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'post' ),
			'category_name'          => 'portafolio',
			'nopaging'               => false,
			'posts_per_page'         => '10',
			'orderby'                => 'rand',
		);

		// The Query
		$portafolio = new WP_Query( $args );

		// The Loop
		if ( $portafolio->have_posts() )
		{
			while ( $portafolio->have_posts() )
			{
				$portafolio->the_post();?>
					<div class="slider__item">
						<figure>
							<a class="gradient" href="<?php the_permalink();?>">
							<?php
								$optional_size	= 'custom-thumb-300-300';
								$img_id			= get_post_thumbnail_id( $post->ID );
								$image			= wp_get_attachment_image_src( $img_id, $optional_size );
								$alt_text		= get_post_meta( $img_id , '_wp_attachment_image_alt', true );
								$perm			= get_permalink ($post->ID );
								if ( $image )
								{
									echo '<img src="#" data-src="' . $image[0] . '" class="lazyOwl" alt="' . $alt_text . '" />';
								}
								else
								{
									echo '<img src="' . get_stylesheet_directory_uri() . '/img/client.jpg" alt="imagen" />';
								}
							;?>
							</a>
							<figcaption><?php echo titulo_corto('...', 40);?></figcaption>
						</figure>
					</div>

				<?php	}
				} else { ?>

					<div class="slider__item">
						<figure>
							<a class="gradient" href="single.html">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/client.jpg" alt="imagen" />
							</a>
							<figcaption>Cliente</figcaption>
						</figure>
					</div>
					<div class="slider__item">
						<figure>
							<a class="gradient" href="single.html">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/client.jpg" alt="imagen" />
							</a>
							<figcaption>Cliente</figcaption>
						</figure>
					</div>
					<div class="slider__item">
						<figure>
							<a class="gradient" href="single.html">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/client.jpg" alt="imagen" />
							</a>
							<figcaption>Cliente</figcaption>
						</figure>
					</div>
					<div class="slider__item">
						<figure>
							<a class="gradient" href="single.html">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/client.jpg" alt="imagen" />
							</a>
							<figcaption>Cliente</figcaption>
						</figure>
					</div>
					<div class="slider__item">
						<figure>
							<a class="gradient" href="single.html">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/client.jpg" alt="imagen" />
							</a>
							<figcaption>Cliente</figcaption>
						</figure>
					</div>
					<div class="slider__item">
						<figure>
							<a class="gradient" href="single.html">
								<img src="<?php bloginfo('stylesheet_directory');?>/img/client.jpg" alt="imagen" />
							</a>
							<figcaption>Cliente</figcaption>
						</figure>
					</div>
					<?php	}
				// Restore original Post Data
				wp_reset_postdata();?>
				</div>
			</aside>
		</div>
<?php get_footer();?>