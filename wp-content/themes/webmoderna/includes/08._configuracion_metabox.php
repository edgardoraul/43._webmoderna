<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'webmoderna_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "webmoderna" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function webmoderna_register_meta_boxes( $meta_boxes )
{
	/**
	* prefix of meta keys (optional)
	* Use underscore (_) at the beginning to make keys hidden
	* Alt.: You also can make prefix empty to disable it
	*/
	// Better has an underscore as last sign
	$prefix = 'webmoderna_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'Botones de acción', 'webmoderna' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'mensajes' ),
		// 'post_types' => array( 'home_page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'side',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(

			/*
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Leyenda del botón 1.', 'webmoderna' ),
				// Field ID, i.e. the meta key
				'id'    => "webmoderna_leyenda_1",
				// Field description (optional)
				'desc'  => __( 'Inserte una leyenda que se mostrará en el botón 1.', 'webmoderna' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'webmoderna' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),

			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Leyenda del botón 2.', 'webmoderna' ),
				// Field ID, i.e. the meta key
				'id'    => "webmoderna_leyenda_2",
				// Field description (optional)
				'desc'  => __( 'Inserte una leyenda que se mostrará en el botón 2.', 'webmoderna' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'webmoderna' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			*/

			// CHECKBOX Habilitar o no el botón del libro ebook
			array(
				'name' => __( 'Descargar ebook parte 1.', 'webmoderna' ),
				'id'   => "webmoderna_descarga_1",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),

			// CHECKBOX Habilitar o no el botón del libro ebook 2
			array(
				'name' => __( 'Descargar ebook parte 2.', 'webmoderna' ),
				'id'   => "webmoderna_descarga_2",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),

			// CHECKBOX Habilitar o no el botón del libro ebook 3
			array(
				'name' => __( 'Descargar ebook parte 3.', 'webmoderna' ),
				'id'   => "webmoderna_descarga_3",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),

			// CHECKBOX Habilitar o no el botón de acción 4
			array(
				'name' => __( 'Test personalizado.', 'webmoderna' ),
				'id'   => "webmoderna_test",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),

			/*
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Meta: Palabras claves.', 'webmoderna' ),
				// Field ID, i.e. the meta key
				'id'    => "webmoderna_meta_keywords",
				// Field description (optional)
				'desc'  => __( 'Palabras claves (keywords) separadas por comas. Son útiles para SEO en algunos buscadores. Máximo 100 caracteres.', 'webmoderna' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'webmoderna' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),

			// RADIO BUTTONS
			array(
				'name'    => __( 'Radio', 'webmoderna' ),
				'id'      => "webmoderna_radio",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'webmoderna' ),
					'value2' => __( 'Label2', 'webmoderna' ),
				),
			),
			// SELECT BOX
			array(
				'name'        => __( 'Select', 'webmoderna' ),
				'id'          => "webmoderna_select",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'webmoderna' ),
					'value2' => __( 'Label2', 'webmoderna' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select an Item', 'webmoderna' ),
			),
			*/

		),
	);
/*
			// HIDDEN
			array(
				'id'   => "webmoderna_hidden",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => __( 'Hidden value', 'webmoderna' ),
			),

			// PASSWORD
			array(
				'name' => __( 'Password', 'webmoderna' ),
				'id'   => "webmoderna_password",
				'type' => 'password',
			),

			// TEXTAREA
			array(
				'name' => __( 'Meta: Descripción', 'webmoderna' ),
				'desc' => __( 'Es una descripción que aparece en el meta description. Es muy recomendable para SEO. Máximo 100 caracteres.', 'webmoderna' ),
				'id'   => "webmoderna_meta_descripcion",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),

		),
		'validation' => array(
			'rules'    => array(
				"webmoderna_password" => array(
					'required'  => true,
					'minlength' => 7,
				),
			),
			// optional override of default jquery.validate messages
			'messages' => array(
				"webmoderna_password" => array(
					'required'  => __( 'Password is required', 'webmoderna' ),
					'minlength' => __( 'Password must be at least 7 characters', 'webmoderna' ),
				),
			),
		),
	);


	// 2nd meta box
	$meta_boxes[] = array(
		'title'  => __( 'Características de la propiedad', 'webmoderna' ),
		'fields' => array(

			// SLIDER
			array(
				'name'       => __( 'Slider', 'webmoderna' ),
				'id'         => "webmoderna_slider",
				'type'       => 'slider',
				// Text labels displayed before and after value
				'prefix'     => __( '$', 'webmoderna' ),
				'suffix'     => __( ' USD', 'webmoderna' ),
				// jQuery UI slider options. See here http://api.jqueryui.com/slider/
				'js_options' => array(
					'min'  => 10,
					'max'  => 255,
					'step' => 5,
				),
			),
			// Precio
			array(
				'name' => __( 'Precio en $', 'webmoderna' ),
				'id'   => "webmoderna_precio",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),
			// Superficie
			array(
				'name' => __( 'Cantidad de Ambientes', 'webmoderna' ),
				'id'   => "webmoderna_superficie",
				'type' => 'number',
				'min'  => 0,
				'step' => 1,
			),
			// Dirección
			array(
				// Field name - Will be used as label
				'name'  => __( 'Dirección.', 'webmoderna' ),
				// Field ID, i.e. the meta key
				'id'    => "webmoderna_direccion",
				// Field description (optional)
				'desc'  => __( 'Calle, número, ciudad...', 'webmoderna' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'webmoderna' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// Comodidades
			array(
				// Field name - Will be used as label
				'name'  => __( 'Comodidades.', 'webmoderna' ),
				// Field ID, i.e. the meta key
				'id'    => "webmoderna_comodidades",
				// Field description (optional)
				'desc'  => __( 'Aire acondicionado, calefacción, etc...', 'webmoderna' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'webmoderna' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),


			// Reservas
			array(
				'name'       => __( 'Calendario de Reservas', 'webmoderna' ),
				'id'         => "webmoderna_date",
				'type'       => 'date',
				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'		=> __( ' día-mes-año', 'webmoderna' ),
					'dateFormat'		=> __( '"dd-mm-yy"', 'webmoderna' ),
					'changeMonth'		=> true,
					'changeYear'		=> true,
					'showButtonPanel'	=> true,
					'autoSize'			=> true,
					'selectMultiple'	=> true,
				),
			),
			// DATETIME
			array(
				'name'       => __( 'Datetime picker', 'webmoderna' ),
				'id'         => $prefix . 'datetime',
				'type'       => 'datetime',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			// TIME
			array(
				'name'       => __( 'Time picker', 'webmoderna' ),
				'id'         => $prefix . 'time',
				'type'       => 'time',
				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),
			// COLOR
			array(
				'name' => __( 'Color picker', 'webmoderna' ),
				'id'   => "webmoderna_color",
				'type' => 'color',
			),
			// AUTOCOMPLETE
			array(
				'name'    => __( 'Autocomplete', 'webmoderna' ),
				'id'      => "webmoderna_autocomplete",
				'type'    => 'autocomplete',
				// Options of autocomplete, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'webmoderna' ),
					'value2' => __( 'Label2', 'webmoderna' ),
				),
				// Input size
				'size'    => 30,
				// Clone?
				'clone'   => false,
			),
			// EMAIL
			array(
				'name' => __( 'Email', 'webmoderna' ),
				'id'   => "webmoderna_email",
				'desc' => __( 'Email description', 'webmoderna' ),
				'type' => 'email',
				'std'  => 'name@email.com',
			),
			// RANGE
			array(
				'name' => __( 'Range', 'webmoderna' ),
				'id'   => "webmoderna_range",
				'desc' => __( 'Range description', 'webmoderna' ),
				'type' => 'range',
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
				'std'  => 0,
			),
			// URL
			array(
				'name' => __( 'URL', 'webmoderna' ),
				'id'   => "webmoderna_url",
				'desc' => __( 'URL description', 'webmoderna' ),
				'type' => 'url',
				'std'  => 'http://google.com',
			),
			// OEMBED
			array(
				'name' => __( 'oEmbed', 'webmoderna' ),
				'id'   => "webmoderna_oembed",
				'desc' => __( 'oEmbed description', 'webmoderna' ),
				'type' => 'oembed',
			),
			// SELECT ADVANCED BOX
			array(
				'name'        => __( 'Select', 'webmoderna' ),
				'id'          => "webmoderna_select_advanced",
				'type'        => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array(
					'value1' => __( 'Label1', 'webmoderna' ),
					'value2' => __( 'Label2', 'webmoderna' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => __( 'Select an Item', 'webmoderna' ),
			),
			// TAXONOMY
			array(
				'name'    => __( 'Taxonomy', 'webmoderna' ),
				'id'      => "webmoderna_taxonomy",
				'type'    => 'taxonomy',
				'options' => array(
					// Taxonomy name
					'taxonomy' => 'category',
					// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
					'type'     => 'checkbox_list',
					// Additional arguments for get_terms() function. Optional
					'args'     => array()
				),
			),
			// POST
			array(
				'name'        => __( 'Posts (Pages)', 'webmoderna' ),
				'id'          => "webmoderna_pages",
				'type'        => 'post',
				// Post type
				'post_type'   => 'mensajes',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => __( 'Select an Item', 'webmoderna' ),
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				)
			),
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name'    => __( 'WYSIWYG / Rich Text Editor', 'webmoderna' ),
				'id'      => "webmoderna_wysiwyg",
				'type'    => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'     => false,
				'std'     => __( 'WYSIWYG default value', 'webmoderna' ),
				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
			// CHECKBOX LIST
			array(
				'name'    => __( 'Checkbox list', 'webmoderna' ),
				'id'      => "webmoderna_checkbox_list",
				'type'    => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'webmoderna' ),
					'value2' => __( 'Label2', 'webmoderna' ),
				),
			),

			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'webmoderna_1', // Not used, but needed
			),

			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Imágenes y Fotos', 'webmoderna' ),
				'id'   => 'fake_id',
				'desc' => __( 'Las fotos deben ser mínimo de 2000px de ancho. Pesan aproximadamente 1 a 2 Megabytes', 'webmoderna' ),
			),

			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Subir varias fotos desde aquí.', 'webmoderna' ),
				'id'               => 'webmoderna_imagenes',
				'type'             => 'image_advanced',
				'max_file_uploads' => false,
			),

			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'webmoderna_2', // Not used, but needed
			),

			// Ubicación en el Mapa
			array(
				'type'         => 'map',
				'id'			=> 'webmoderna_map',
				'width'        => '100%', // Map width, default is 640px. Can be '%' or 'px'
				'height'       => '480px', // Map height, default is 480px. Can be '%' or 'px'
				'zoom'         => 25,  // Map zoom, default is the value set in admin, and if it's omitted - 14
				'marker'       => true, // Display marker? Default is 'true',
				'marker_title' => '', // Marker title when hover
				'info_window'  => '<h3>Info Window Title</h3>Info window content. HTML <strong>allowed</strong>', // Info window content, can be anything. HTML allowed.
				'js_options'   => array(
					// 'mapTypeId'   => 'HYBRID',
					'zoomControl' => true,
					'zoom'        => 16, // You can use 'zoom' inside 'js_options' or as a separated parameter
				)
			),
			// echo rwmb_meta( 'loc', $args ); // For current post
			// echo rwmb_meta( 'loc', $args, $post_id ); // For another post with $post_id


			// FILE UPLOAD
			array(
				'name' => __( 'File Upload', 'webmoderna' ),
				'id'   => "webmoderna_file",
				'type' => 'file',
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'File Advanced Upload', 'webmoderna' ),
				'id'               => "webmoderna_file_advanced",
				'type'             => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type'        => 'application,audio,video', // Leave blank for all file types
			),
			// IMAGE UPLOAD
			array(
				'name' => __( 'Image Upload', 'webmoderna' ),
				'id'   => "webmoderna_image",
				'type' => 'image',
			),
			// THICKBOX IMAGE UPLOAD (WP 3.3+)
			array(
				'name' => __( 'Thickbox Image Upload', 'webmoderna' ),
				'id'   => "webmoderna_thickbox",
				'type' => 'thickbox_image',
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Image Advanced Upload', 'webmoderna' ),
				'id'               => "webmoderna_imgadv",
				'type'             => 'image_advanced',
				'max_file_uploads' => 4,
			),
			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Subir varias fotos desde aquí.', 'webmoderna' ),
				'id'               => "webmoderna_plupload",
				'type'             => 'plupload_image',
				'max_file_uploads' => false,
			),

			// BUTTON
			array(
				'id'   => "webmoderna_button",
				'type' => 'button',
				'name' => 'webmoderna_map', // Empty name will "align" the button to all field inputs
			),
		)
	);
*/
	return $meta_boxes;
}


// Es para las páginas y posts
add_filter( 'rwmb_meta_boxes', 'meta_paginas_register_meta_boxes' );
function meta_paginas_register_meta_boxes( $meta_boxes )
{
	// Better has an underscore as last sign
	$prefix = 'meta_paginas_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'estandard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => __( 'S.E.O. y posicionamiento web', 'webmoderna' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page', 'post' ),
		// 'post_types' => array( 'home_page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Palabras claves.', 'webmoderna' ),
				// Field ID, i.e. the meta key
				'id'    => "meta_paginas_meta_keywords",
				// Field description (optional)
				'desc'  => __( 'Palabras claves (keywords) separadas por comas. Son útiles para SEO en algunos buscadores. Máximo 100 caracteres.', 'webmoderna' ),
				'type'  => 'text',
				// Default value (optional)
				// 'std'   => __( '', 'webmoderna' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
		// TEXTAREA
			array(
				'name' => __( 'Descripción', 'webmoderna' ),
				'desc' => __( 'Es una descripción que aparece en el meta description. Es muy recomendable para SEO. Máximo 100 caracteres.', 'webmoderna' ),
				'id'   => "meta_paginas_meta_descripcion",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 2,
			),

			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Imágenes y Fotos', 'webmoderna' ),
				// Not used but needed for plugin
				'id'   => 'fake_id',
				'desc' => __( 'Las fotos deben ser mínimo de 2000px de ancho. Pesan aproximadamente 1 a 2 Megabytes', 'webmoderna' ),
			),

			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Subir varias fotos desde aquí. ', 'webmoderna' ),
				'id'               => 'webmoderna_imagenes',
				'type'             => 'image_advanced',
				'max_file_uploads' => false,
			),
		));
	return $meta_boxes;
};