<?php 
/**
 * Plugin Name: Custom Registration Form
 * Description: Just a rough plugin example to answer a WPSE question
 * Plugin URI: http://wordpress.stackexchange.com/questions/10309/
 * Author: G. M.
 * Author URI: http://wordpress.stackexchange.com/users/35541/g-m
 *
 */
 
if ( is_admin() ) return;

load_plugin_textdomain(
  'custom_reg_form',
  FALSE,
  plugin_dir_path( __FILE__ ) . 'langs'
); 

require_once plugin_dir_path( __FILE__ ) . 'FieldInterface.php';
require_once plugin_dir_path( __FILE__ ) . 'fields.php';
require_once plugin_dir_path( __FILE__ ) . 'Form.php';
require_once plugin_dir_path( __FILE__ ) . 'Saver.php';
require_once plugin_dir_path( __FILE__ ) . 'CustomReg.php';



/**
* Generate dynamic registration url
*/
function custom_registration_url() {
  $nonce = urlencode( wp_create_nonce( 'registration_url' ) );
  return home_url( $nonce );
}

/**
* Generate dynamic registration link
*/
function custom_registration_link() {
  $format = '<a href="%s">%s</a>';
  printf(
    $format,
    custom_registration_url(), __( 'Register', 'custom_reg_form' )
  );
}

/**
* Setup, show and save the form
*/
add_action( 'wp_loaded', function() {
  try {
    $form = new Custom_Reg\Form;
    $saver = new Custom_Reg\Saver;
    $custom_reg = new Custom_Reg\Custom_Reg( $form, $saver );
    $custom_reg->init();
  } catch ( Exception $e ) {
    if ( defined('WP_DEBUG') && WP_DEBUG ) {
      $msg = 'Exception on  ' . __FUNCTION__;
      $msg .= ', Type: ' . get_class( $e ) . ', Message: ';
      $msg .= $e->getMessage() ? : 'Unknown error';
      error_log( $msg );
    }
    wp_safe_redirect( home_url() );
  }
}, 0 );

/**
* Add fields to form
*/
add_action( 'custom_reg_form_init', function( $form ) {
  $classes = array(
    'Custom_Reg\FullName',
    'Custom_Reg\Login',
    'Custom_Reg\Email',
    'Custom_Reg\Country'
  );
  foreach ( $classes as $class ) {
    $form->addField( new $class );
  }
}, 1 );?>