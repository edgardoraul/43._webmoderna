<?php

// Cargamos el script validador
function my_admin_scripts()
{
	wp_enqueue_script( 'custom-users-fields-js', get_template_directory_uri() . '/js/custom-users-fields.js', array( 'jquery' ), '1.0' );
}
add_action( 'admin_print_scripts', 'my_admin_scripts' );


// Agregamos los campos adicionales al formulario de registro
function add_fields_to_users_register_form()
{
	$user_town		= ( isset( $_POST['user_town'] ) ) ? $_POST['user_town'] : '';
	$user_province	= ( isset( $_POST['user_province'] ) ) ? $_POST['user_province'] : '';
	$user_phone		= ( isset( $_POST['user_phone'] ) ) ? $_POST['user_phone'] : '';
?>

	<p>
		<label for="user_town"><?php _e( 'Ciudad', 'emyth' );?><br />
		<input type="text" maxlength="30" id="user_town" name="user_town" class="input" size="25" value="<?php echo esc_attr( $user_town );?>"></label>
	</p>

	<p>
		<label for="user_province"><?php _e( 'Provincia', 'emyth' );?><br />
		<input type="text" maxlength="30" id="user_province" name="user_province" class="input" size="25" value="<?php echo esc_attr( $user_province );?>"></label>
	</p>

	<p>
		<label for="user_phone"><?php _e( 'Teléfono', 'emyth' );?><br />
		<input type="tel" maxlength="12" id="user_phone" name="user_phone" class="input" size="25" value="<?php echo esc_attr( $user_phone );?>"></label>
	</p>

<?php
}
add_action( 'register_form', 'add_fields_to_users_register_form' );

// Validamos los campos adicionales
function validate_user_fields ( $errors, $sanitized_user_login, $user_email )
{
	if ( empty( $_POST['user_town'] ) )
	{
		$errors -> add( 'user_town_error', __( '<strong>ERROR</strong>: Por favor, introduce tu Ciudad.', 'emyth' ) );
	}
	if ( empty( $_POST['user_province'] ) )
	{
		$errors -> add( 'user_province_error', __( '<strong>ERROR</strong>: Por favor, introduce tu Provincia.', 'emyth' ) );
	}
	if ( empty( $_POST['user_phone'] ) )
	{
		$errors -> add( 'user_phone_error', __( '<strong>ERROR</strong>: Por favor, introduce tu Teléfono.', 'emyth' ) );
	}
	return $errors;
}
add_filter( 'registration_errors', 'validate_user_fields', 10, 3 );


// Agregamos los campos adicionales a Tu Perfil y Editar Usuario
function add_custom_fields_to_users( $user )
{
	$user_town = esc_attr( get_the_author_meta( 'user_town', $user->ID ) );
	$user_province = esc_attr( get_the_author_meta( 'user_province', $user->ID ) );
	$user_phone = esc_attr( get_the_author_meta( 'user_phone', $user->ID ) );
	$user_opinion = esc_attr( get_the_author_meta( 'user_opinion', $user->ID ) );?>

	<h3><?php _e( '¿Nos podrías dar tu opinión?', 'emyth' ) ?></h3>

	<table class="form-table">
		<tr>
			<th><label for="user_town"><?php _e( 'Ciudad', 'emyth' );?></label></th>
			<td><input type="text" name="user_town" id="user_town" class="regular-text" value="<?php echo $user_town;?>" /></td>
		</tr>
		<tr>
			<th><label for="user_province"><?php _e( 'Provincia', 'emyth' );?></label></th>
			<td><input type="text" name="user_province" id="user_province" class="regular-text" value="<?php echo $user_province;?>" /></td>
		</tr>
		<tr>
			<th><label for="user_phone"><?php _e( 'Teléfono', 'emyth' );?></label></th>
			<td><input type="tel" maxlength="12" name="user_phone" id="user_phone" class="regular-text" value="<?php echo $user_phone;?>" /></td>
		</tr>
		<tr>
			<th><label for="user_opinion"><?php _e( 'Opinión/Testimonio', 'emyth' );?></label></th>
			<td><textarea rows="5" maxlength="120" name="user_opinion" id="user_opinion" class="regular-text"><?php echo $user_opinion;?></textarea></td>
		</tr>
	</table>
<?php }

add_action( 'show_user_profile', 'add_custom_fields_to_users' );
add_action( 'edit_user_profile', 'add_custom_fields_to_users' );

add_action( 'personal_options_update', 'save_user_fields' );
add_action( 'edit_user_profile_update', 'save_user_fields' );


// Guardamos los campos adicionales en base de datos
function save_user_fields ( $user_id )
{
	if ( isset( $_POST['user_town'] ) )
	{
		update_user_meta( $user_id, 'user_town', sanitize_text_field( $_POST['user_town'] ) );
	}

	if ( isset( $_POST['user_province'] ) )
	{
		update_user_meta( $user_id, 'user_province', sanitize_text_field( $_POST['user_province'] ) );
	}

	if ( isset( $_POST['user_opinion'] ) )
	{
		update_user_meta( $user_id, 'user_opinion', sanitize_text_field( $_POST['user_opinion'] ) );
	}

	if ( isset( $_POST['user_phone'] ) )
	{
		update_user_meta( $user_id, 'user_phone', sanitize_text_field( $_POST['user_phone'] ) );
	}
}
add_action( 'user_register', 'save_user_fields' );



?>
