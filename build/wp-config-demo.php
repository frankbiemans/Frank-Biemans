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
define('DB_NAME', 'startkitv2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'MwGTGZHzxEbaNxh5');

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
define('AUTH_KEY',         '+J+KA4rNO$q_|F@OVRB6gEGxe#N|.A::gg-&u)%#.-c?D`e}7ZdzN+-P@ubiwbT6');
define('SECURE_AUTH_KEY',  '24u1C[u]&#3-xdfL^C3(0iruX+MG#|kop;wcsPn5%iERskaHN7C/2ISy/yB_gu8>');
define('LOGGED_IN_KEY',    'xM_Oh]f{fqpVLT{y0]9{273bY+Fu|/!g!^+iYLJY__8pS2RaKIM;>6b5hGl @e+G');
define('NONCE_KEY',        'd$at-(up>#[UYR-xaeooK_>G|k>mm>J@]nIN^KJ/m0[1siK8py2%sM9 atcu_AH>');
define('AUTH_SALT',        '(Qgd%7V;D)%en>7,wQ%jQF^G_>S{@~gmxmT5~0Z0cs?}JME,ykC6{@.QV7;kW>Pm');
define('SECURE_AUTH_SALT', '.{$HB<l;i)|2+oXEtT2v6P_@!Ekk==`c8C-KHsI|ZMRaD&TpB=-,+uurDZ6>ZS8L');
define('LOGGED_IN_SALT',   '*k<ua+;V]9_iF4:I7~15Yey6i{9{OatqWNdI{dwp[!-U&`.ee=|nyLj{l4WG~Ft|');
define('NONCE_SALT',       'SsOz%goVV<apLpcaJEcqkSM$^*I^5aU2_,ee<a@[!,!7wqw$1MIxbu,v$@#[@pv`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpskv3_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
