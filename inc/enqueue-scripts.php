<?php
/**
 * Connect stylesheets & scripts
 *
 * @package pitchfork
 */

/**
 * Register/enqueue scripts for Pitchfork.
 *
 * @return void
 */
function pitchfork_enqueue_scripts() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// Compiled SASS from ASU Boostrap + theme modifications.
	$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
	wp_enqueue_style( 'pitchfork-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

	// Jquery + Bootstrap Bundle with PopperJS.
	$bs_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/src/js/bootstrap.bundle.min.js' );
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/src/js/bootstrap.bundle.min.js', array( 'jquery' ), $bs_js_version );

	// Component header, footer and cookie consent.
	wp_enqueue_script ( 'component-header-vendor', get_template_directory_uri()  . '/src/component-header/js/vendor.umd.js', array( 'wp-element', 'wp-components' ), null, false );
	wp_enqueue_script ( 'component-header', get_template_directory_uri()  . '/src/component-header/js/asuHeader.umd.js', array( 'wp-element', 'wp-components' ), null, false );

	wp_enqueue_script ( 'component-footer-vendor', get_template_directory_uri()  . '/src/component-footer/js/vendor.umd.js', array( 'wp-element', 'wp-components' ), null, false );
	wp_enqueue_script ( 'component-footer', get_template_directory_uri()  . '/src/component-footer/js/asuFooter.umd.js', array( 'wp-element', 'wp-components' ), null, false );

	wp_enqueue_script ( 'component-cookie-vendor', get_template_directory_uri()  . '/src/component-cookie-consent/js/vendor.umd.js', array( 'wp-element', 'wp-components' ), null, false );
	wp_enqueue_script ( 'component-cookie', get_template_directory_uri()  . '/src/component-cookie-consent/js/asuCookieConsent.umd.js', array( 'wp-element', 'wp-components' ), null, false );

	// Custom scripts from the theme. Includes init files for above components.
	$custom_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/custom.min.js' );
	wp_enqueue_script( 'pitchfork-custom', get_template_directory_uri() . '/js/custom.min.js', array( 'jquery', 'bootstrap-bundle' ), $custom_js_version, true );

	// Font Awesome. Kit licensed and distributed by ASU Engineering for use with this theme.
	wp_enqueue_script ( 'font-awesome-kit', 'https://kit.fontawesome.com/51b562cd96.js', array(), null, false );
	wp_script_add_data( 'font-awesome-kit', 'crossorigin', 'anonymous' );

}
add_action( 'wp_enqueue_scripts', 'pitchfork_enqueue_scripts' );


/**
 * Register/enqueue scripts for Pitchfork.
 */
function pitchfork_enqueue_admin_scripts() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// SASS fixes specifically for the admin area. (Gutenberg).
	$admin_css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/admin.min.css' );
	wp_enqueue_style( 'pitchfork-admin-styles', get_template_directory_uri() . '/css/admin.min.css', array(), $admin_css_version );

	// Jquery + Bootstrap Bundle with PopperJS.
	$bs_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/src/js/bootstrap.bundle.min.js' );
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/src/js/bootstrap.bundle.min.js', array( 'jquery' ), $bs_js_version );

	// Font Awesome. Kit distributed by ASU Engineering.
	wp_enqueue_script ( 'font-awesome-kit', 'https://kit.fontawesome.com/51b562cd96.js', array(), null, false );
	wp_script_add_data( 'font-awesome-kit', 'crossorigin', 'anonymous' );

	// Applying heading highlight classes to core/headings block.
	$js_heading_highlights = $theme_version . '.' . filemtime( get_template_directory() . '/js/heading-highlights.js' );
	wp_enqueue_script( 'uds-heading-highlights', get_template_directory_uri() . '/js/heading-highlights.js', array( 'wp-rich-text', 'wp-element', 'wp-editor' ), $js_heading_highlights );

}
add_action( 'admin_enqueue_scripts', 'pitchfork_enqueue_admin_scripts' );

/**
 * Register/enqueue scripts for the block editor.
 */
function pitchfork_enqueue_block_scripts() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	// Block modifications.
	$blocks_js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/block-variations.js' );
	wp_enqueue_script( 'pitchfork-block-mods', get_template_directory_uri() . '/js/block-variations.js',  array( 'wp-blocks', 'wp-dom' ), $blocks_js_version , true );
}
add_action( 'enqueue_block_editor_assets', 'pitchfork_enqueue_block_scripts' );
