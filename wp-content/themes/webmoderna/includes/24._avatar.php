<?php
// Nuestro propio avatar

// Cargando la imagen por defecto
function additional_user_fields( $user ) { ?>
	<h3><?php _e( 'Avatar Personalizado', 'emyth' ); ?></h3>
	<table class="form-table">
		<tr>
			<th><label for="user_meta_image"><?php _e( 'Foto de perfil', 'emyth' ); ?></label></th>
			<td>
				<!-- Outputs the image after save -->
				<?php if( get_the_author_meta( 'user_meta_image', $user->ID ) ) { ?>
				<img id="avatar_usuario" src="<?php echo esc_url( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" style="border:4px solid #ffffff; border-radius: 4px; box-shadow: 4px 4px 4px #000000; -o-box-shadow: 4px 4px 4px #000000; -ms-box-shadow: 4px 4px 4px #000000; -moz-box-shadow: 4px 4px 4px #000000; -webkit-box-shadow: 4px 4px 4px #000000; width: 100px;" />
				<?php } else { ?>
				<img id="avatar_usuario" src="<?php echo get_stylesheet_directory_uri();?>/img/logo.png" style="border:4px solid #ffffff; border-radius: 4px; box-shadow: 4px 4px 4px #000000; -o-box-shadow: 4px 4px 4px #000000; -ms-box-shadow: 4px 4px 4px #000000; -moz-box-shadow: 4px 4px 4px #000000; -webkit-box-shadow: 4px 4px 4px #000000; width: 100px;" />
				<?php };?>
				<br />
				<!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
				<input type="text" name="user_meta_image" id="user_meta_image" value="<?php echo esc_url_raw( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" class="regular-text" />
				<!-- Outputs the save button -->
				<input type='button' class="additional-user-image button-primary" value="<?php _e( 'Subir imagen', 'emyth' ); ?>" id="uploadimage"/>
				<br />
				<span class="description"><?php _e( 'Subir una imagen para tu perfil de 100px por 100px.', 'emyth' ); ?></span>
			</td>
		</tr>
	</table><!-- end form-table -->
<?php }
// additional_user_fields
add_action( 'show_user_profile', 'additional_user_fields' );
add_action( 'edit_user_profile', 'additional_user_fields' );

// Guardando en la base de datos
function save_additional_user_meta( $user_id )
{
	// only saves if the current user can edit user profiles
	if ( !current_user_can( 'edit_user', $user_id ) )
	{
		return false;
	}

	// update_usermeta( $user_id, 'user_meta_image', $_POST['user_meta_image'] );
	// Lo reemplazé porque el anterior está obsoleto
	update_user_meta( $user_id, 'user_meta_image', $_POST['user_meta_image'] );
}
add_action( 'personal_options_update', 'save_additional_user_meta' );
add_action( 'edit_user_profile_update', 'save_additional_user_meta' );

// Llamando al cargador de medias
function enqueue_media()
{
    if( function_exists( 'wp_enqueue_media' ) )
    {
        wp_enqueue_media();
    }
}

add_action('admin_enqueue_scripts', 'enqueue_media');


// Con esto tratamos de que la imagen se adapte de las que tenemos configuradas antes
/**
 * Return an ID of an attachment by searching the database with the file URL.
 *
 * First checks to see if the $url is pointing to a file that exists in
 * the wp-content directory. If so, then we search the database for a
 * partial match consisting of the remaining path AFTER the wp-content
 * directory. Finally, if a match is found the attachment ID will be
 * returned.
 *
 * http://frankiejarrett.com/get-an-attachment-id-by-url-in-wordpress/
 *
 * @return {int} $attachment
 */
function get_attachment_image_by_url( $url )
{
	// Split the $url into two parts with the wp-content directory as the separator.
	$parse_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

	// Get the host of the current site and the host of the $url, ignoring www.
	$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
	$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

	// Return nothing if there aren't any $url parts or if the current host and $url host do not match.
	if ( !isset( $parse_url[1] ) || empty( $parse_url[1] ) || ( $this_host != $file_host ) )
	{
		return;
	}

	// Now we're going to quickly search the DB for any attachment GUID with a partial path match.
	// Example: /uploads/2013/05/test-image.jpg
	global $wpdb;

	$prefix     = $wpdb->prefix;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM " . $prefix . "posts WHERE guid RLIKE %s;", $parse_url[1] ) );

	// Returns null if no attachment is found.
	return $attachment[0];
}

// Para mostrar un tamaño que ya elegí: el "thumbnail". Pude ser otro si quiero.
function get_additional_user_meta_thumb()
{
	$attachment_url = get_the_author_meta( 'user_meta_image', $post->post_author );

	// grabs the id from the URL using Frankie Jarretts function
	$attachment_id = get_attachment_image_by_url( $attachment_url );

	// retrieve the thumbnail size of our image
	$image_thumb = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );

	// return the image thumbnail
	return $image_thumb[0];
}
?>