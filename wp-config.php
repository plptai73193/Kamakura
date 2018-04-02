<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kamakuradata');

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
define('AUTH_KEY',         'E.M$54pF8`=V^q4>X,9RPi?LKsUO5_hV<flX2An;x|iX Zd>IMNpLDe=_3C;k<Iz');
define('SECURE_AUTH_KEY',  'IxFWD }P*A>Q>Wlpp|6RxW)@TQ>,7i{ft$?)O3CEk]~goDjVawQ,fYulf~?3q oi');
define('LOGGED_IN_KEY',    'Y?JUOyd0%c(F5d0l 2dZ#+&:/)A sus$b7`PjWZPEGK1K?K>c$@1nVc$8EHy(qq5');
define('NONCE_KEY',        ';;j0~<c3N!]&R<OUkht1d?_b,^InR&6PI9FbhQ>Ibh+GH}kROI@i)8(72i8i#X8Z');
define('AUTH_SALT',        'aV08pbTbWh$9D*M*HS[_E%VgqYbW4-UMX.@8(oX/&wWBGB>Fa?hYoE47K~+&@3o&');
define('SECURE_AUTH_SALT', 'Y6Kq!S;;i%?nDX,HsS~zxKHo0K#iEOV$hFVu.h+qz`^o7|GlDI*{Z>elZgw`X{C2');
define('LOGGED_IN_SALT',   'g8#v]v7 IxZ=cjo+=+ x$VIV}}~c+`gtiUt859G4Law:![U-=QP=HbJg}Ec8Y(ED');
define('NONCE_SALT',       'nD3W.3)=-|`)7vQvNk-MDA@N0xn.CeX5=fhv5USM3A&yG`%HC<93-rjsN&v{ms*T');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('ENV', 'testing');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
