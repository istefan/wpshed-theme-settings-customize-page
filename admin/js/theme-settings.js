/**
 * Theme Settings Customizer
 */

( function( $ ) {


	// Expand / collapse sidebar
	var theme_settings_overlay = $( '.theme-settings-overlay' );

	$( '.collapse-sidebar' ).on( 'click', function() {
		
		if ( theme_settings_overlay.hasClass( 'expanded' ) ) {
			theme_settings_overlay.removeClass( 'expanded' ).addClass( 'collapsed' );
		} else {
			theme_settings_overlay.removeClass( 'collapsed' ).addClass( 'expanded' );
		}

		return false;
	});


} )( jQuery );