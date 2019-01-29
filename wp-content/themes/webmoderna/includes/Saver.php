<?php
namespace Custom_Reg;

class Saver {
    
  protected $fields;
  
  protected $user = array( 'user_login' => NULL, 'user_email' => NULL );
  
  protected $meta = array();
  
  protected $error;
  
  public function setFields( \ArrayIterator $fields ) {
    $this->fields = $fields;
  }
  
  /**
  * validate all the fields
  */
  public function validate() {
    // if registration is not allowed return false
    if ( ! get_option('users_can_register') ) return FALSE;
    // if registration is not allowed return false
    if ( ! $this->getFields() instanceof \ArrayIterator ) return FALSE;
    // first check nonce
    $nonce = $this->getValue( '_n' );
    if ( $nonce !== wp_create_nonce( 'custom_reg_form_nonce' ) ) return FALSE;
    // then check all fields
    $it =  $this->getFields();
    while( $it->valid() ) {
      $field = $it->current();
      $key = $field->getID();
      if ( ! $field instanceof FieldInterface ) {
        throw new \DomainException( "Invalid field" );
      }
      $value = $this->getValue( $key, $field->getFilter() );
      if ( $field->isRequired() && empty($value) ) {
        $this->error = sprintf( __('%s is required', 'custom_reg_form' ), $key );
        return FALSE;
      }
      if ( ! $field->isValid( $value ) ) {
        $this->error = sprintf( __('%s is not valid', 'custom_reg_form' ), $key );
        return FALSE;
      }
      if ( in_array( "user_{$key}", array_keys($this->user) ) ) {
        $this->user["user_{$key}"] = $value;
      } else {
        $this->meta[$key] = $value;
      }
      $it->next();
    }
    return TRUE;
  }
  
  /**
  * Save the user using core register_new_user that handle username and email check
  * and also sending email to new user
  * in addition save all other custom data in user meta
  *
  * @see register_new_user()
  */
  public function save() {
    // if registration is not allowed return false
    if ( ! get_option('users_can_register') ) return FALSE;
    // check mandatory fields
    if ( ! isset($this->user['user_login']) || ! isset($this->user['user_email']) ) {
      return false;
    }
    $user = register_new_user( $this->user['user_login'], $this->user['user_email'] );
    if ( is_numeric($user) ) {
      if ( ! update_user_meta( $user, 'custom_data', $this->meta ) ) {
        wp_delete_user($user);
        return FALSE;
      }
      return TRUE;
    } elseif ( is_wp_error( $user ) ) {
      $this->error = $user->get_error_message();
    }
    return FALSE;
  }
  
  public function getValue( $var, $filter = FILTER_SANITIZE_STRING ) {
    if ( ! is_string($var) ) {
      throw new \InvalidArgumentException( "Invalid value" );
    }
    $method = strtoupper( filter_input( INPUT_SERVER, 'REQUEST_METHOD' ) );
    $type = $method === 'GET' ? INPUT_GET : INPUT_POST;
    $val = filter_input( $type, $var, $filter );
    return $val;
  }
  
  public function getFields() {
    return $this->fields;
  }
  
  public function getErrorMessage() {
    return $this->error;
  }

}?>