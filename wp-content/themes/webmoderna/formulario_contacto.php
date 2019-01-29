<?php

// Definición de variables a usar
$nombre_sitio  	  = get_bloginfo('name');
$facebook_contact = of_get_option('facebook_contact', '');
$twitter_contact  = of_get_option('twitter_contact', '');
$skype_contact    = of_get_option('skype_contact', '');
$email_contact    = of_get_option('email_contact', '');
$telefono_fijo    = of_get_option('telefono_fijo', '');
$telefono_celular = of_get_option('telefono_celular', '');
$direccion_web    = of_get_option('direccion_web', '');

// Formulario de la encuesta
$message	=	'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.5, user-scalable=yes" />
	<title>'; $message .= $GLOBALS['ct_msg_subject'] . '</title>
	<link rel="shortcut icon" type="image/x-icon" href="http://webmoderna.com.ar/wp-content/themes/webmoderna/img/favicon.ico" />
	<style type="text/css">
		*
		{
			border: none;
			color: #594A42;
			font-family: "Bookman Old Style", Garamond, Georgia, serif;
			font-size: 18px;
			margin: 0;
			padding: 0;
		}
		a, p
		{
			line-height: 20px;
		}
		a
		{
			color: #02A79E;
			border: none;
		}
		a:hover, a:focus
		{
			color: #DF1C4B;
		}
		a:active
		{
			color: #DF1C4B;
		}
		body
		{
			background: #312720;
		}
		h1, h2, h3, h4, h5
		{
			font-family: "Trebuchet MS", "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			font-size: 22px;
			font-weight: lighter;
			text-transform: uppercase;
		}
		h1
		{
			color: #feffef;
		}
		h2
		{
			color: #feffef;
		}
		p
		{
			margin-bottom: 8px;
			margin-top: 8px;
		}
		table
		{
			border-collapse: collapse;
		}
		td
		{
			padding-bottom: 16px;
			padding-left: 8px;
			padding-right: 8px;
			padding-top: 16px;
		}
		#redes_sociales p a
		{
			display: inline-block;
			border-left: 1px solid #312720;
			padding: 4px 10px;
		}
		#redes_sociales p a:hover, #redes_sociales p a:focus
		{
			color: #B24946 !important;
		}
		#redes_sociales p a:active
		{
			color: #FFC6C4 !important;
		}
		#redes_sociales p a:first-child
		{
			border-left: none;
		}
		.contenido
		{
			border-color: #594A42;
			border-style: solid;
			border-width: 1px;
			box-shadow: 3px 3px 8px #000000;
			-o-box-shadow: 3px 3px 8px #000000;
			-ms-box-shadow: 3px 3px 8px #000000;
			-moz-box-shadow: 3px 3px 8px #000000;
			-webkit-box-shadow: 3px 3px 8px #000000;
			margin-left: auto;
			margin-right: auto;
			max-width: 800px;
		}
	</style>
</head>
<body>
	<table width="100%" align="center">
		<tbody>
			<tr>
				<td align="center">
					<table width="600" style="max-width:800px;" class="contenido" align="center">
						<tbody>

<!-- ============================ El encabezado con logo y título ====================================== -->
							<tr>
								<td colspan="2" align="center">
									<h1>'; $message .= $nombre_sitio . '</h1>
									<span style="color:#9C8F89;">'; $message .= get_bloginfo('description') . '</span>
								</td>
							</tr>
							<tr>
								<td align="left">
									<a href="' . get_bloginfo('url') . '">
										<img src="http://webmoderna.com.ar/wp-content/themes/webmoderna/img/logo_400w.png" width="200" alt="'; $message .= $nombre_sitio . '" />
									</a>
								</td>
								<td align="right">
									<h2 style="color:#9C8F89">'; $message .= $GLOBALS['ct_msg_subject'] . '</h2>
								</td>
							</tr>



<!-- =============================== El cuerpo principal =========================================== -->
							<tr>
								<td colspan="2" bgcolor="#ecf0f1" align="left">
									<strong>'; $message .= __('Apellido y Nombre: ', 'webmoderna') . '</strong>
									'; $message .= $name . '
								</td>
							</tr>
							<tr>
								<td colspan="2" bgcolor="#ffffff" align="left">
									<strong>E-Mail: </strong>
									<a target="_blank" href="mailto:'; $message .= $email . '">'; $message .= $email . '</a>
								</td>
							</tr>
							<tr>
								<td colspan="2" bgcolor="#ecf0f1" align="left">
									<strong>'; $message .= __('Teléfono: ', 'webmoderna') . '</strong>
									'; $message .= $URL . '
								</td>
							</tr>
							<tr>
								<td colspan="2" bgcolor="#ffffff" align="left">
									<strong>'; $message .= __('Mensaje: ', 'webmoderna') . '</strong>
									'; $message .= $mensage . '
								</td>
							</tr>
							<tr>
								<td colspan="2" bgcolor="#ecf0f1" align="left">
									<strong>'; $message .= __('Navegador Web: ', 'webmoderna') . '</strong>
									'; $message .= $_SERVER['HTTP_USER_AGENT'] . '
								</td>
							</tr>
							<tr>
								<td colspan="2" bgcolor="#ffffff" align="left">
									<strong>'; $message .= __('Dirección IP: ', 'webmoderna') . '</strong>
									'; $message .= $_SERVER['REMOTE_ADDR'] . '
								</td>
							</tr>



<!-- ===================================== Footer ========================================================0 -->
							<tr>
								<td colspan="2" align="center" id="footer">
									<p>
										<a href="mailto:'; $message .= $email_contact . '">'
										; $message .= $email_contact .
										'</a>
										<span> | </span>
										<a href="' . get_bloginfo('url') . '">'
										. get_bloginfo('url') . 
										'</a>
									</p>
									<p>
										Celular: ' ; $message .= $telefono_celular . '
									</p>
								</td>
							</tr>


<!-- =========================================== Redes Sociales =========================================== -->
							<tr>
								<td colspan="2" align="center" id="redes_sociales" style="font-size: 14px; text-align: left; max-width: 800px !important;" align="left">
									<p>
									'.__('Este mensaje y sus adjuntos son privados, confidenciales y exclusivos para sus destinatarios. Pueden contener información protegida por normas legales y de secreto profesional. Bajo ninguna circunstancia su contenido puede ser transmitido o revelado a terceros ni divulgado en forma alguna. Si usted los ha recibido por error, por favor comuníquenoslo inmediatamente vía correo electrónico y tenga la amabilidad de eliminarlos de su sistema. Muchas gracias.', 'webmoderna').'
 									</p>
 									<p>
 									'.__('Queda prohibida su reproducción o redistribución total o parcial a destinatarios no autorizados expresamente por ' . $nombre_sitio . ', resultando quien infrinja dicha disposición infractor a la Ley 11723 y concordantes.', 'webmoderna').'
 									</p>
 									<p>
 									'.__('Colabora cuidando nuestro Medio Ambiente. Por favor, no imprimas este mensaje si no es necesario.', 'webmoderna').'
 									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
';