<?php
/**
* 404.php
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
								Error 404
							</h1>
						</header>

						<div class="page__article__content">
							<h2>
								<?php _e('No entendemos qué quisiste hacer :-/', 'webmoderna');?>
							</h2>
						</div>
					</article>
				</section>
			</main>
		</div>

<?php get_sidebar();?>

		<div class="separador"></div>
<?php get_footer();?>