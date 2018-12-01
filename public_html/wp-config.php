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
define('DB_NAME', 'kmctigue_katiemctigue');

/** MySQL database username */
define('DB_USER', 'kmctigue');

/** MySQL database password */
define('DB_PASSWORD', 'TimLeary3');

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
define('AUTH_KEY',         'H0^9,w.w&0E:W-A ?i!b`]D$Z$7k4+L3x=D*H .B`-Nt/BGV2*_<&Q:bNlraZHd]');
define('SECURE_AUTH_KEY',  '}xTY?=zl)9ZI+N&*Zi-]MY=>+WUlo2!W_D,t!VFu r:t0!pJD7&(:%r9UI`vzD#5');
define('LOGGED_IN_KEY',    '-$1Th-B0g2y+vk9RM,&g/:-=pOkHT;ccc4rl%-X6EC1+V@6&BBiO@n-,|3^ZNfIt');
define('NONCE_KEY',        'jL`-#9sN~cACt{N?d+W/W8|>V?JQ%q {K+m*3>L-Dc|5rG8Pn_Sxfk|yb4/.+L?6');
define('AUTH_SALT',        'S:!pM!VW-etu)HOixpm_683eSm1F7ZyF|{*S#Ei*<SweEq`RY~do+,F-WM&<r5yR');
define('SECURE_AUTH_SALT', 'HlHbR5^)s1|r*%Ho6-}&u$N*qE.va;B5FJK`M^gd3o-m%X^EZRtw+?3F8spG7qYG');
define('LOGGED_IN_SALT',   '{q>YN}]X?z}_&Pn{ulXuD2%|R;9(7M-:jY7bFyU5-,]1H# +Cs4cs5D{h/*/A1jn');
define('NONCE_SALT',       'PD%Kw[N%~u--Q6i}FLh.b-6(X5JYG2&+SyBzbcIg+i<0M86B%yTn6&f_:/N6u)2a');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
