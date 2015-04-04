<?php
/**
 * WPshed - Theme Settings
 */


/**
 * Hook for adding admin menus
 */
function wpshed_theme_settings_page() {

    // Add a new appearance menu:
    $theme_settings = add_theme_page(
        __( 'Custom Customize', 'wpshed' ),
        __( 'Custom Customize', 'wpshed' ),
        'manage_options',
        'theme-settings',
        'wpshed_theme_settings_html'
    );

    add_action( "load-{$theme_settings}", 'wpshed_theme_settings_scripts' );

}
add_action( 'admin_menu', 'wpshed_theme_settings_page' );


/**
 * Load theme settings scripts
 */
function wpshed_theme_settings_scripts() {

	wp_enqueue_script( 'wpshed-theme-settings', get_template_directory_uri() . '/admin/js/theme-settings.js', array( 'jquery' ), null, true );

}


/**
 * Output theme settings HTML
 */
function wpshed_theme_settings_html() {

	$settings_page = 'theme-settings';

	?>

	<div class="wrap">

		<h2><?php _e( 'Theme Settings', 'wpshed' ); ?></h2>

		<p><?php _e( 'Click the button below to load the theme settings customize page.', 'wpshed' ); ?></p>
        <p><a class="button button-primary" href="<?php echo admin_url( 'themes.php?page='. $settings_page .'&customize=true' ); ?>"><?php _e( 'Custom Customize Page', 'wpshed' ); ?></a></p>

	</div><!-- .wrap -->

    <?php if ( isset( $_GET['customize'] ) && $_GET['customize'] == true ) : ?>

    <div class="theme-install-overlay wp-full-overlay expanded theme-settings-overlay" style="display: block;">
    	
    	<div class="wp-full-overlay-sidebar">
    		
    		<div class="wp-full-overlay-header">
    			<a class="close-full-overlay" href="<?php echo admin_url( 'themes.php?page=' . $settings_page ); ?>">
					<span class="screen-reader-text"><?php _e( 'Close', 'wpshed' ); ?></span>
				</a>
				<a class="button button-primary theme-install" href="#"><?php _e( 'Save', 'wpshed' ); ?></a>
    		</div><!-- .wp-full-overlay-header -->

    		<div class="wp-full-overlay-sidebar-content">
    			<p><?php _e( 'Custom stuff goes here.', 'wpshed' ); ?></p>
    		</div><!-- .wp-full-overlay-sidebar-content -->

    		<div class="wp-full-overlay-footer">
        		<a class="collapse-sidebar" title="Collapse Sidebar" href="#">
					<span class="collapse-sidebar-label"><?php _e( 'Collapse', 'wpshed' ); ?></span>
					<span class="collapse-sidebar-arrow"></span>
				</a>
    		</div><!-- .wp-full-overlay-footer -->

    	</div><!-- .wp-full-overlay-sidebar -->

    	<div class="wp-full-overlay-main">
    		<iframe src="<?php echo esc_url( home_url( '/' ) ); ?>"></iframe>
    	</div>

    </div><!-- .wp-full-overlay -->

	<?php endif; ?>

<?php

}
