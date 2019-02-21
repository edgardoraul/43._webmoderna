<?php // Metabox: Calendario de Reservas
function myplugin_add_meta_box2()
{
	$screens = array( 'post' );
	foreach ( $screens as $screen )
	{
		add_meta_box(
			'myplugin_sectionid2',
			__( 'Calendario de Reservas.', 'emyth' ),
			'myplugin_meta_box_callback2',
			$screen,
			'side'
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box2' );

function myplugin_meta_box_callback2( $post )
{
	// Estilos del multidatepicker, ahora unificado y minificado
	// echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/jquery-ui.css" />';
	// echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/jquery-ui.structure.css" />';
	// echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/jquery-ui.theme.css" />';
	// echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/pepper-ginder-custom.css" />';
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/css/multidatepicker.css" />';

	// Scripts del multidatepicker. Ahora Unificado y minificado
	// echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().'../js/jquery-1.11.1.js"></script>';
	// echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().'../js/jquery-ui-1.11.1.js"></script>';
	// echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().'../js/jquery-ui.multidatespicker.js"></script>';
	echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().'../js/multidatepicker.min.js"></script>';


	$value = get_post_meta( $post->ID, '_my_meta_value_key2', true );
	wp_nonce_field( 'myplugin_meta_box2', 'myplugin_meta_box_nonce2' );
	echo '<label for="myplugin_new_field2" class="multidatespicker">' . _e("Hacer clic en el campo del formulario y luego clic en las fechas deseadas", "emyth") . '</label>';
	echo '<input type="text" class="multidatespicker" id="myplugin_new_field2" name="myplugin_new_field2" value="' . esc_attr( $value ) . '" />';
?>
	<script type="text/javascript">
		$(".multidatespicker").multiDatesPicker(
		{
			dateFormat: '"dd-mm-yy"',
			showButtonPanel : true
		})
	</script>
<?php
}

function myplugin_save_meta_box_data2( $post_id )
{
	if ( ! isset( $_POST['myplugin_meta_box_nonce2'] ) )
	{
		return;
	}
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce2'], 'myplugin_meta_box2' ) )
	{
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	{
		return;
	}
	if ( isset( $_POST['post_type'] ) && 'myplugin_new_field2' == $_POST['post_type'] )
	{
		if ( ! current_user_can( 'edit_page', $post_id ) )
		{
			return;
		}
	}
	else
	{
		if ( ! current_user_can( 'edit_post', $post_id ) )
		{
			return;
		}
	}
	if ( ! isset( $_POST['myplugin_new_field2'] ) )
	{
		return;
	}
	$my_data = sanitize_text_field( $_POST['myplugin_new_field2'] );
	update_post_meta( $post_id, '_my_meta_value_key2', $my_data );
}
add_action( 'save_post', 'myplugin_save_meta_box_data2' );

;?>