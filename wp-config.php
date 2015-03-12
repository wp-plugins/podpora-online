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
define('DB_NAME', 'wickcz');

/** MySQL database username */
define('DB_USER', 'wickcz');

/** MySQL database password */
define('DB_PASSWORD', '773f3f8dc8b4be8');

/** MySQL hostname */
define('DB_HOST', 'mysql-g1');

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
define('AUTH_KEY',         '>x 8D;F]IC&~Ru:)|,e!Nb#&U^kTMvX.3=H?W&7=)yHdJp3)@/Tt{[g;WgR5Ej&#');
define('SECURE_AUTH_KEY',  '%GW:*TF!sip~oLl}7,F?pyJBNWZPqD(RVd4j=~<t|$_nIU@+Z+gtbI.H^t6gv7va');
define('LOGGED_IN_KEY',    '(,(Wd3W[@1M vY.*de#}#A[UC0ehUV~0[C(l4(Vzn<*&x-3n?16cpq4C]aKV%.P|');
define('NONCE_KEY',        '|-t#pR/lq tp{)5GR{QxYmSNs5.+$Qu ;#K7kaQ^]KAEpG!2{3]l16^^Ur7m4W2z');
define('AUTH_SALT',        '/_H)|*]< ;_jwg=2*$yH3);qKy!z+sKm95(oJC)8bNnM7Kep@q^~`{ZY3A1NmyPw');
define('SECURE_AUTH_SALT', 'jUxPE#XBXC=pR.S.R8^5,f/k8@O@z+@D3QeB+Cq ix#7_[h3}O8BO0AQ1$-z+<m~');
define('LOGGED_IN_SALT',   'Cx[DwT~+3}z #Za`eb|1i_+csM)Zb`P`=u$]G7(-Y|O1%T]|l^m79}d.5ijbP_&{');
define('NONCE_SALT',       'f+<;bl?zi`l~!(oQ;atxL|DOptoV,Y[c]G,d+`+,2,`g;|x/fnu%6-$C.zR,iG%b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';
define( 'WP_MEMORY_LIMIT', '96M' );

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'cs_CZ');

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
