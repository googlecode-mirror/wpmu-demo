<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'srikrung');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'LoB)(^uGy,}9vg+%13.gBMhGz%U7MHEq6!j1hEMOL!=OtG84Hc!_Gqz X4HlEhtr');
define('SECURE_AUTH_KEY',  'Lyeu;g`W9ny_8z1t#JFH,4*O0wZ[_l?Aq3gD2X~*&K-ik<PwAHDj.COo,R;he3*]');
define('LOGGED_IN_KEY',    'VT ^X`FuijN<T}P-W&zlI@P/ah?@LAskHvY*:)=3LM?|.~*xFGPa+ZJfngDe;v7;');
define('NONCE_KEY',        'H0<h>KeCf|*BJkNx()mMa`w5`51y:9v1OIa^BPZVmVum#S4YX8bK6-w+}~O[KpsL');
define('AUTH_SALT',        'OCRbkE2B<Q79y !jM4d<{jRR1xjR5gs*ef0qe.`(zE?Et7P4j`rV#f%KBkd8fUmS');
define('SECURE_AUTH_SALT', 'X8<cgUcc&3ebU7UAl)qEwEdFR1G,V.2xBXf|1l= d~sB<YhjaJF(mYw*,@N$X{wg');
define('LOGGED_IN_SALT',   '%G^_t##$Y9k1+f?c}]M <&r?E&Urm2@er0M-eASr$^gO8l9qjaYm7peh*MGJ(/VC');
define('NONCE_SALT',       'UfEx`7K=!(mLh]oS>m1ZulP;hTxxn:vNM^n^HWAouN:nEMTNe;1PAF#j,=_S=2w!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'th_TH');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* Multisite */
define('WP_DEFAULT_THEME', 'attitude');
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/srikrung/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
