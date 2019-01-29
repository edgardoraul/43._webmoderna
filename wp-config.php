<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cz000021_webmoderna');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'A~Iz~K}eqPs%yrxKZa1RZPFVfRy>C AnuwmJ.]cJ_& `KA:4D!^rx6%$eG@(vtE]');
define('SECURE_AUTH_KEY',  'so0U+7D1%e^ 98$L:p#%$Ofuy:y@|sgqRKT&sg0^UhLcf-T)gckJcL%~&2SqF$y(');
define('LOGGED_IN_KEY',    '.j?RQ:)BW~qZ3r/WwW@++^v)RpeUKIcK5*p%(v`1@I0XGRL!TY0N%}X^I,q:hd^>');
define('NONCE_KEY',        'xoZI~]3p}%}rLk%Qpt%|[~~V:v^dQY=4O3_ht=:u^bGURoPY1s;4p}PdsZN7h0US');
define('AUTH_SALT',        ';13gf55>@VW4c`48H2NU7Ws;$f+;e`k` 0YAxAx1rEvx6`.N(TV6;Ee*P pbu-fG');
define('SECURE_AUTH_SALT', '`UcGROhOs.{>z)67|@-fUplw.O<IwS,9e%<pc>=m*qtf`*YyVa)V}p</1z5##4~D');
define('LOGGED_IN_SALT',   '>?M^y~)nC:qs&E_pJbU!dm0{,!@~-?Y+mTxr}9-m:vYt8^fujUiVF/$&b,=s@)!;');
define('NONCE_SALT',       '@_;AF1W71q&!r)oBL_modRDY$#beEY#:%$VbhDc4{BKQy?WzI_*Bf0-0RE:UVKHk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
// Idioma del sitio web.
// require_once( dirname( __FILE__ ) . '/wp-lang.php' );

// Modo depuración
define('WP_DEBUG', true);
@ini_set('log_errors', 'On');
@ini_set('display_errors', 'On');
@ini_set('error_log', '/php_error.log');


// Depurando scripts
define( 'SCRIPT_DEBUG', true );
define( 'CONCATENATE_SCRIPTS', false );
define( 'CONCATENATE_CSS', false );
define( 'COMPRESS_SCRIPTS', false );


// Compresión y concatenación de estilos
define( 'COMPRESS_CSS', false );
define( 'COMPRESS_JS', false );
define( 'ENFORCE_GZIP', false );

// Autoguardado de posts y páginas para evitar pérdidas si se corta las conexión a internet.
define( 'AUTOSAVE_INTERVAL', 60 );

// Evitar imágenes duplicadas
define( 'IMAGE_EDIT_OVERWRITE', true );

// Nuevas urls absolutas pero dinámicas y sirven para desarrollo en local con otros dispositivos
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/43._webmoderna' );
define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] . '/43._webmoderna' );


/* Updates */
define( 'WP_AUTO_UPDATE_CORE', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
