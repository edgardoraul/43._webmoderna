<?php
/**
* index.php
* @package WordPress
* @subpackage webmoderna
* @since webmoderna 3.0
* Text Domain: webmoderna
*/
?>
<?php get_header();?>
		<div class="separador"></div>

		<!-- Todo la parte central -->
		<div class="content">
			<main>
				<?php
				// Las miguillas de pan
				the_breadcrums();?>
				

				<!-- Single -->
				<section class="page">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
					<article class="page__article">
						<header class="page__article__header">
							<h1 class="page__article__header__title">
								<?php the_title();?>
							</h1>
						</header>
						<div class="page__article__content">
							<figure class="page__article__figure">
								<?php
								$optional_size	= 'custom-thumb-400-300';
								$optional_size2	= 'custom-thumb-1800-x';
								$img_id			= get_post_thumbnail_id( $post->ID );
								$image			= wp_get_attachment_image_src( $img_id, $optional_size );
								$image2			= wp_get_attachment_image_src( $img_id, $optional_size2 );
								$alt_text		= get_post_meta( $img_id , '_wp_attachment_image_alt', true );
								$perm			= get_permalink ($post->ID );
								if ( $image )
								{
									echo '<a href="' . $image2[0] . '" class="swipebox" title="' . $alt_text . '">';
									// echo '<img src="' . $image[0] . '" alt="' . $alt_text . '" />';
									the_post_thumbnail('custom-thumb-400-300');
									echo '</a>';
									echo '<figcaption>' . get_the_title() . '</figcaption>';
								}
								else
								{
									echo '<img src="' . get_stylesheet_directory_uri() . '/img/p5.jpg" alt="imagen" /><figcaption>' . __('Contenido', 'webmoderna') . '</figcaption>';
								}?>
							</figure>

							<?php the_content();?>
						</div>

						
						<!-- Un slider para lo producido -->
						<div id="owl-galeria" class="owl-carousel slider__secundario">
						<?php 

						$images = rwmb_meta( 'webmoderna_imagenes', 'size=custom-thumb-300-300' );

						if ( !empty( $images ) )
						{
							foreach ( $images as $image )
							{
								echo '<div class="slider__item">
										<figure>';
								echo "<a rel='index' class='gradient swipebox' href='{$image['custom-thumb-1200-x']}'>";
								echo "<img src='#' class='lazyOwl' data-src='{$image['url']}' alt='{$image['alt']}' />";
								echo '</a>';
								echo '</figure>
									</div>';
							}
						}?>
								
						</div>
					</article>

					<?php endwhile; ?>

					<!-- La paginación de post -->
					<div class="post_pagination">
						<?php previous_post_link('<div class="post_pagination__back">%link</div>' );?>
						<?php next_post_link( '<div class="post_pagination__next">%link</div>' ); ?>
					</div>

					<!-- Los Comentarios -->
					<div class="page__article__content">
						<?php comments_template();?>
					</div>

					
					<!-- La paginación de post -->
					<?php if ( comments_open() ) { ?>
					<div class="post_pagination">
						<?php previous_post_link('<div class="post_pagination__back">%link</div>' );?>
						<?php next_post_link( '<div class="post_pagination__next">%link</div>' ); ?>
					</div>
					<?php }; ?>

					<?php else : ?>

						<article class="entradas__article">
							<h2>
								<?php _e('No hay nada publicado en esta etiqueta.', 'webmoderna');?>
							</h2>
						</article>

					<?php endif;?>

					<!-- Comentarios y demás -->
				</section>
			</main>
		</div>
		
<?php get_sidebar();?>

		<div class="separador"></div>
<?php get_footer();?>