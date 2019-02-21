<?php
/*
* page.php
* @package WordPress
* @subpackage webmoderna
* @since webmoderna 3.0
* Text Domain: webmoderna
*/

get_header();
?>
<div class="separador"></div>

		<!-- Todo la parte central -->
		<div class="content">
			<main>
				<?php
				// Las miguillas de pan
				the_breadcrums();?>
				

				<!-- La Página en si -->
				<section class="page">
					<article class="page__article">
						<header class="page__article__header">
							<h1 class="page__article__header__title">
								<?php the_title();?>
							</h1>
						</header>

						<?php rewind_posts(); if ( have_posts() ) : while ( have_posts() ) : the_post();?>

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
									echo '<figcaption>' . $alt_text . '</figcaption>';
								}
								else
								{
									echo '<img src="' . get_stylesheet_directory_uri() . '/img/p5.jpg" alt="imagen" /><figcaption>' . __('Contenido', 'webmoderna') . '</figcaption>';
								}?>
							</figure>

							<?php the_content();?>
						</div>

						<?php endwhile; else : ?>
							<div class="page__article__content">
								<?php _e('No hay nada publicado.', 'webmoderna');?>
							</div>
						<?php endif; ?>

					</article>
				</section>
			</main>
		</div>

<?php get_sidebar();?>

		<div class="separador"></div>
<?php get_footer();?>