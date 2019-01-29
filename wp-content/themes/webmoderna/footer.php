<?php
/**
* footer.php
* @package WordPress
* @subpackage webmoderna
* @since webmoderna 2.0
* Text Domain: webmoderna
*/

// Variables a utilizar
$google_plus_contact	=	of_get_option( 'google_plus_contact', '' );
$facebook_contact		=	of_get_option( 'facebook_contact', '' );
$twitter_contact		=	of_get_option( 'twitter_contact', '' );
$linkedin_contact		=	of_get_option( 'linkedin_contact', '' );
$github_contact			=	of_get_option( 'github_contact', '' );
$add_this_script		=	of_get_option( 'add_this_script', '');
$google_analitycs		=	of_get_option( 'google_analitycs', '');
?>

		<!-- El footer de la página -->
		<footer class="footer">
			<!-- Redes sociales -->
			<div class="footer__redes_sociales">
				<ul class="footer__redes_sociales__list">
					<?php if ( $google_plus_contact )
					{
						echo '<li class="footer__redes_sociales__list__item"><a target="_blank" class="icon-google-plus" href="//' . $google_plus_contact . '" title="Google+"></a></li>';
					};
					if ( $facebook_contact )
					{
						echo '<li class="footer__redes_sociales__list__item"><a target="_blank" class="icon-facebook" href="' . $facebook_contact . '" title="Facebook"></a></li>';
					};
					if ( $twitter_contact )
					{
						echo '<li class="footer__redes_sociales__list__item"><a target="_blank" class="icon-twitter" href="//' . $twitter_contact . '" title="Twitter"></a></li>';
					};
					if ( $github_contact )
					{
						echo '<li class="footer__redes_sociales__list__item"><a target="_blank" class="icon-github" href="//' . $github_contact . '" title="GitHub"></a></li>';
					};?>

					<li class="footer__redes_sociales__list__item">
						<a href="<?php bloginfo('rss2_url');?>" title="RSS" class="icon-rss"></a>
					</li>
				</ul>
			</div>

			<!-- Derechos de copia -->
			<div class="footer__copyright">
				<p>&copy; <?php echo date("Y ");bloginfo("name"); ?></p>
				<p><?php _e('Todos los derechos reservados', 'webmoderna');?></p>
			</div>

			<!-- Ir hacia arriba -->
			<div id="ir_arriba" class="gotop">
				<a href="#" title="<?php _e('Ir hacia arriba', 'webmoderna');?>"></a>
			</div>
		</footer>
	</div>
	<!--<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>-->
	<script type="text/javascript" defer src="//code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" defer src="<?php bloginfo('stylesheet_directory');?>/js/scripts.min.js"></script>
	<?php

	// El script para compartir
	if ( $add_this_script )
	{
		echo '<script type="text/javascript" async defer src="' . $add_this_script . '"></script>';
	};

	// El google Analitics
	if ( $google_analitycs )
	{
		echo '<script type="text/javascript">' . $google_analitycs . '</script>';
	};
	wp_footer();?>
</body>
</html>