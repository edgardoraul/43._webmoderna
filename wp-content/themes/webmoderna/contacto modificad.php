<?php
/**
* contacto.php
* @package WordPress
* @subpackage webmoderna
* @since webmoderna 3.0
* Text Domain: webmoderna
* Template Name: Contacto
*/

// Definición de variables
$nombre_sitio	= get_bloginfo('name');
$email_contact	= of_get_option('email_contact','');

// La primera línea de todas. This MUST be called prior to any output including whitespaces and line breaks!
if(	!isset( $_SESSION ) )
{ 
	session_start(); 
} 

$GLOBALS['DEBUG_MODE'] = 0;
// CHANGE TO 0 TO TURN OFF DEBUG MODE
// IN DEBUG MODE, ONLY THE CAPTCHA CODE IS VALIDATED, AND NO EMAIL IS SENT

$GLOBALS['ct_recipient']   = $email_contact; // Change to your email address!
$GLOBALS['ct_msg_subject'] = __( 'Consulta vía web', 'webmoderna' );

// The form processor PHP code
function process_si_contact_form()
{
	$_SESSION['ctform'] = array(); // re-initialize the form session data

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' && @$_POST['do'] == 'contact' )
	{
		// if the form has been submitted

		foreach( $_POST as $key => $value )
		{
			if ( !is_array( $key ) )
			{
				// sanitize the input data
				if ( $key != 'ct_message' ) $value = strip_tags( $value );
				$_POST[$key] = htmlspecialchars( stripslashes( trim( $value ) ) );
			}
		}

		$name				= @$_POST['ct_name'];		// Apellido y nonbre
		$email				= @$_POST['ct_email'];		// email from the form
		$URL				= @$_POST['ct_URL'];		// el teléfono
		// $educacion			= @$_POST['ct_educacion'];	// Opciones de educación
		$mensage			= @$_POST['ct_message'];	// el mensaje
		$captcha			= @$_POST['ct_captcha'];	// the user's entry for the captcha code
		$name				= substr( $name, 0, 64 );		// limit name to 64 characters

		$errors = array();  // initialize empty error array

		if ( isset( $GLOBALS['DEBUG_MODE'] ) && $GLOBALS['DEBUG_MODE'] == false )
		{
			// only check for errors if the form is not in debug mode
			// Nombre corto y error
			if ( strlen( $name ) < 3 )
			{
				$errors['name_error'] = __('Debes completar tu nombre y apellido', 'webmoderna');
			}

			// Teléfono corto y error
			if ( strlen( $URL ) < 8 )
			{
				$errors['telefono_error'] = __('Debes completar tu teléfono.', 'webmoderna');
			}

			// Educación sin datos
			// if ( $educacion == "" )
			// {
			// 	$errors['educacion_error'] = __('Debes seleccionar tu nivel de educación.', 'webmoderna');
			// }

			// Campo de email vacío
			if ( strlen( $email ) == 0 )
			{
				$errors['email_error'] = __('Debes completar tu dirección de correo eletrónico', 'webmoderna');
			}
			else if ( strlen( $email ) > 60 )
			{
				$errors['email_error'] = __('Tu cuenta es demasiado larga. Intentá completar con otra cuenta de correo con mayor sentido común.', 'webmoderna');
			}
			else if ( !preg_match( '/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $email ) )
			{
				// Formato de email inválido
				$errors['email_error'] = __('La dirección de correo electrónico es inválida.', 'webmoderna');
			}

			// Mensaje demasiado corto
			if ( strlen( $mensage ) < 20 )
			{
				$errors['message_error'] = __('Tienes que ingresar un mensaje y que no sea muy corto.', 'webmoderna');
			}
		}

		// Only try to validate the captcha if the form has no errors
		// This is especially important for ajax calls
		if ( sizeof( $errors ) == 0 )
		{
			require_once 'includes/securimage/securimage.php';
			$securimage = new Securimage();

			if ( $securimage->check( $captcha ) == false )
			{
				$errors['captcha_error'] = __('El código de seguridad es incorrecto', 'webmoderna');
			}
		}

		if ( sizeof( $errors ) == 0 )
		{
			// no errors, send the form
			$time       = date('r');
			include_once "formulario_contacto.php";
			// $message = "Este mensaje fue enviado desde webmoderna Argentina. Es una consulta vía web.<br /><br />"
				// . "Apellido y Nombre: $name<br />"
				// . "Correo eletrónico: $email<br />"
				// . "Teléfono: $URL<br />"
				// . "Nivel de educación: $educacion<br />"
				// . "Mensaje:<br />"
				// . "<pre>$message</pre>"
				// . "<br /><br />Dirección IP: {$_SERVER['REMOTE_ADDR']}<br />"
				// . "Fecha y Hora: $time<br />"
				// . "Navegador web: {$_SERVER['HTTP_USER_AGENT']}<br />";
				// charset=ISO-8859-1
				

			// $message = wordwrap ($message, 70 );

			if ( isset( $GLOBALS['DEBUG_MODE'] ) && $GLOBALS['DEBUG_MODE'] == false )
			{
				// send the message with mail()
				// mail( $GLOBALS['ct_recipient'], $GLOBALS['ct_msg_subject'], $message, "From: {$GLOBALS['ct_recipient']}\r\nReply-To: {$email}\r\nContent-type: text/html; charset=utf-8\r\nMIME-Version: 1.0" );
				mail( $email, $GLOBALS['ct_msg_subject'], $message, "From: {$GLOBALS['ct_recipient']}\r\nReply-To: {$email}\r\nContent-type: text/html; charset=utf-8\r\nMIME-Version: 1.0" );
			}

			$_SESSION['ctform']['error']		= false;  // no error with form
			$_SESSION['ctform']['success']		= true; // message sent
		}
		else
		{
			// save the entries, this is to re-populate the form
			$_SESSION['ctform']['ct_name']		= $name;       // save name from the form submission
			$_SESSION['ctform']['ct_email']		= $email;		// save email
			$_SESSION['ctform']['ct_URL']		= $URL;        // guarda el teléfono
			// $_SESSION['ctform']['ct_educacion']	= $educacion;	// guarda el nivel de educación
			$_SESSION['ctform']['ct_message']	= $mensage;		// save message

			foreach( $errors as $key => $error )
			{
				// set up error messages to display with each field
				$_SESSION['ctform'][$key] = "<span class='respuesta--mal'>$error</span>";
			}

			$_SESSION['ctform']['error'] = true; // set error floag
		}
	} // POST
}

$_SESSION['ctform']['success'] = false; // clear success value after running

// Encabezado normal de la página
get_header();
?>
<div class="separador"></div>

		<!-- Todo la parte central -->
		<div class="content">
			<main>
				<?php
				// Las miguillas de pan
				the_breadcrums();?>				

				<!-- La Página en si -->
				<section class="page">
					<article class="page__article">
						<header class="page__article__header">
							<h1 class="page__article__header__title">
								<?php the_title();?>
							</h1>
						</header>

						<?php rewind_posts(); if ( have_posts() ) : while ( have_posts() ) : the_post();?>

						<div class="page__article__content">
							<h3><?php _e('Completar todos los campos', 'webmoderna');?></h3>

<?php
// Las respuestas de proceso exitoso o fallido del formulario

// Process the form, if it was submitted
process_si_contact_form();

// The last form submission had 1 or more errors
if ( isset( $_SESSION['ctform']['error'] ) &&  $_SESSION['ctform']['error'] == true ):
?>

<div class="respuesta">
	<span class="respuesta--error"><?php _e('Hubo un error al enviar el mensaje :-(', 'webmoderna');?></span>
</div>

<?php
// form was processed successfully
elseif ( isset( $_SESSION['ctform']['success'] ) && $_SESSION['ctform']['success'] == true ):
?>

<div class="respuesta">
	<span class="respuesta--ok"><?php _e('Formulario enviado exitosamente :-D', 'webmoderna');?></span>
</div>

<?php endif; ?>

							<form method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING']);?>" id="contact_form">

								<!-- Mensaje de Error -->
								<div class="resultado"><?php echo @$_SESSION['ctform']['name_error'];?></div>

								<input type="text" placeholder="<?php _e('Apellido y Nombre', 'webmoderna');?>" maxlength="60" name="ct_name" value="<?php echo htmlspecialchars(@$_SESSION['ctform']['ct_name']);?>" />
								<input type="hidden" name="do" value="contact" />


								<!-- Mensaje de Error -->
								<div class="resultado"><?php echo @$_SESSION['ctform']['email_error'];?></div>

								<input type="email" name="ct_email" id="ct_email" placeholder="E-Mail" maxlength="60" value="<?php echo htmlspecialchars(@$_SESSION['ctform']['ct_email']) ?>" />


								<!-- Mensaje de Error -->
								<div class="resultado"><?php echo @$_SESSION['ctform']['telefono_error'];?></div>

								<input type="tel" id="ct_URL" name="ct_URL" placeholder="<?php _e('Teléfono', 'webmoderna');?>" maxlength="13" value="<?php echo htmlspecialchars(@$_SESSION['ctform']['ct_URL']) ?>" />


								<!-- Mensaje de Error -->
								<div class="respuesta"><?php echo @$_SESSION['ctform']['message_error'] ?></div>

								<textarea name="ct_message" id="ct_message" maxlength="1000" placeholder="<?php _e('Escriba aquí (mínimo 20 caracteres)', 'webmoderna');?>..."><?php echo htmlspecialchars(@$_SESSION['ctform']['ct_message']) ?></textarea>

								<div class="verificacion">
									<h4><?php _e('Escribe el código de la imagen', 'webmoderna');?></h4>
									<div class="respuesta"><?php echo @$_SESSION['ctform']['captcha_error'];?></div>

									<img id="siimage" class="captcha--imagen" src="<?php bloginfo('stylesheet_directory');?>/includes/securimage/securimage_show.php?sid=358a297ce08f7cb69a2ff8bd52a7d63c" alt="CAPTCHA Image" />
									<a class="recargar__imagen" href="#" title="Recargar imagen" onclick="document.getElementById('siimage').src = '<?php bloginfo('stylesheet_directory');?>/includes/securimage/securimage_show.php?sid=' + Math.random(); this.blur(); return false">
										<img src="<?php bloginfo('stylesheet_directory');?>/includes/securimage/images/refresh.png" alt="<?php _e('Recargar imagen', 'webmoderna');?>" height="32" width="32" onclick="this.blur()" />
									</a>

									<input class="captcha__input" type="text" id="ct_captcha" name="ct_captcha"  placeholder="abc12" maxlength="8" />
								</div>

								<div class="alineacion__derecha">
									<button type="submit">
										<span class="icon-checkmark icon-right"></span>
										<?php _e('Enviar', 'webmoderna');?>
									</button>
									<button type="reset">
										<span class="icon-cross icon-right"></span>
										<?php _e('Limpiar', 'webmoderna');?>
									</button>
								</div>
							</form>
						</div>

						<?php endwhile; else : ?>
							<div class="page__article__content">
								<?php _e('No hay nada publicado.', 'webmoderna');?>
							</div>
						<?php endif; ?>

					</article>
				</section>
			</main>
		</div>

<?php get_sidebar();?>

		<div class="separador"></div>
<?php get_footer();?>