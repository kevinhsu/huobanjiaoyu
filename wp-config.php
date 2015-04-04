<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'V}y4x?-|JZ9Ig ;!DG3I>SVC_gseFLFt+Ubw2[Icr|QY$IFx_0$UG^S-h#@-T:48');
define('SECURE_AUTH_KEY',  '-YE:yD7K{2k4yX;q`]:j~P8k)q1:BuPFN6VMjOQ(N>lD5#(gW2<jb=Z1/Y+eEHdN');
define('LOGGED_IN_KEY',    'J-gMVr^zN=ISZbYcu|e#&(Cg776G0mJyA$-+@ Ru|.=Hu,?{@Wqd+Eq|nSUw4e+6');
define('NONCE_KEY',        '*/>KpMoC*+-o3.xDNe[~[RyRDE`$>*0;A+&O]+E.k3aX2wJ033aUZ/kRs3A/m`(g');
define('AUTH_SALT',        'lFwK:iq-w<aa(VB~zr0A+Hy^RI-+w4e|R|k][72&OWiR*<IRBKKTC;;iO+=3^-/Y');
define('SECURE_AUTH_SALT', '_ZFk|~Mva&%5QOS>)lW KjAQgzofir:|2 `[lfxy<3$^%%GstM!S5-N84w2)*]kx');
define('LOGGED_IN_SALT',   '5:Lx=CW`N*?c|~gO$cu96jlngLlZ|X{d(O`N|te1W}8GPZ/x1_MY8B|PKB*Vc|Wt');
define('NONCE_SALT',       ';$;sS#ezP+6sTuOXR_(p@|u#[52g5$Ht2yVK4jUhl&y}d=;]B i`8C|x**N/ZW~|');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
