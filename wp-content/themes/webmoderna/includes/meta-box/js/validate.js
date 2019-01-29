jQuery( function ( $ )
{
	'use strict';

	var $form = $( '#post' ),
		rules = {
			invalidHandler: function ()
			{
				// Re-enable the submit ( publish/update ) button and hide the ajax indicator
				$( '#publish' ).removeClass( 'button-primary-disabled' );
				$( '#ajax-loading' ).attr( 'style', '' );
				$form.siblings( '#message' ).remove();
				$form.before( '<div id="message" class="error"><p>' + rwmbValidate.summaryMessage + '</p></div>' );
			}
		};

	// Gather all validation rules
	$( '.rwmb-validation-rules' ).each( function ()
	{
		var subRules = $( this ).data( 'rules' );
		jQuery.extend( true, rules, subRules );

		// Required field styling
		$.each( subRules, function ( k, v )
		{
			if ( v['required'] )
			{
				$( '#' + k ).parent().siblings( '.rwmb-label' ).addClass( 'required' ).append( '<span>*</span>' );
			}
		} );
	} );

	// Execute
	$form.validate( rules );

	// Limitar la entrada de caracteres a 160 en los campos de Meta Keywords y Meta Description del dashboard de las entradas.
	$(document).ready(function()
	{
		var caracteres = 100;
		$( "#meta_paginas_meta_keywords, #meta_paginas_meta_descripcion, #meta_keywords2" ).keyup( function()
		{
			if( $( this ).val().length > caracteres )
			{
				$( this ).val( $( this ).val().substr( 0, caracteres ) );
			}
		});
	});
});
