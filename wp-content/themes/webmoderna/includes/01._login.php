<?php
// Captcha en el login
function start_login_session()
{
	if( !session_id() )
	{
		session_start();
	}
}
add_action( 'init', 'start_login_session', 1 );

function destroy_login_session()
{
	session_destroy();
}
add_action( 'wp_logout', 'destroy_login_session' );
add_action( 'wp_register', 'destroy_login_session' );

function add_captcha_field()
{
	$digit1 = mt_rand(1,10);
	$digit2 = mt_rand(1,10);
	if( mt_rand(0,1) === 1 )
	{
		$_SESSION['math'] = "$digit1 + $digit2";
		$_SESSION['answer'] = $digit1 + $digit2;
	} else if ($digit1 < $digit2)
	{
		$_SESSION['math'] = "$digit2 - $digit1";
		$_SESSION['answer'] = $digit2 - $digit1;
	}
	else
	{
		$_SESSION['math'] = "$digit1 - $digit2";
		$_SESSION['answer'] = $digit1 - $digit2;
	}
	// $_SESSION['captcha'] = $_SESSION['answer'];

	echo '<p><label for="user_catpcha">' . __('Cuánto es ', 'emyth') . $_SESSION['math'] . ' = ';
	echo '<input class="input" type="number" min="0" max="20"  placeholder="...?" id="user_catpcha" name="user_catpcha" style="width:100px;" />';
	echo '</label></p>';
}
add_action( 'login_form', 'add_captcha_field' );
add_action( 'register_form', 'add_captcha_field' );

function user_captcha_authenticate( $user, $username, $password )
{
	$_POST['user_catpcha'] = isset( $_POST['user_catpcha'] ) ? $_POST['user_catpcha'] : null ;
	$submission = $_POST['user_catpcha'];
	$user = get_user_by( 'login', $username );
	$random = $_SESSION['answer'];
	if ( !$user || empty( $submission ) || $submission != $random )
	{
		remove_action( 'authenticate', 'wp_authenticate_username_password', 20);
		if( is_user_logged_in() )
		{
			return new WP_Error( 'die', '<strong>ERROR</strong>!' );
		}
		unset( $_SESSION['answer'] );
	}
	return;
	unset( $_SESSION['answer'] );
}
add_filter( 'authenticate', 'user_captcha_authenticate', 10, 3 );
// add_filter( 'register', 'user_captcha_authenticate', 10, 3 );
?>