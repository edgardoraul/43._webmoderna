<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'cz000021_webmoderna');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '(-O<W2XD=vR0 uidtf!B8.Mtn~,LOHuF%#XIdb[F09FQJIo=63:w!.Wtp{Yl4dH^');
define('SECURE_AUTH_KEY', 'E[J$jkymtV&YRu?Ohw^X8#(%4vzdbP[w-{r#GE5CL+H385??M52iWV?K__kYRaz!');
define('LOGGED_IN_KEY', '@cuSR1NL5}mRFD,uMY`@jn(oQ7eKwN(/*4_5UIUp;Xh6 /m(C8B[/<lt)_^8Y#Bu');
define('NONCE_KEY', '2Gu2n jNjzHvCEHRRVR@LVY9j8selNc!MVBmfugc;6gxe{yb4@W7s*|#c?a?_g}[');
define('AUTH_SALT', 'R+!P&]$+F,5.wU|(`b/=c$k)V%[jg$ 7:E_&C&:bja43qN/!@;0cGk BK2-~44sT');
define('SECURE_AUTH_SALT', '#4zhrjJ0;W!=2Vj,<<&I>!^xji@x{~ST?90,J~9OaF4tf|lrx5s%&$yvMt~ds]W9');
define('LOGGED_IN_SALT', '8cuSqjBh_dP8dvEFE;D#l7^e#-Piny-la{cY)Gpff`U.pKIUf4LRHVrVF>z5^f36');
define('NONCE_SALT', 'KE0?S3|0+3AbFhglGss<&HH.ZU%MP?~LX/t#$}x/(][A@V3|uv2BUHg=a/IzQj:%');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', true);
define('WP_ALLOW_REPAIR', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

