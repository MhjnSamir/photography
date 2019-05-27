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
define( 'DB_NAME', 'photography' );

/** MySQL database username */
define( 'DB_USER', 'wordpressuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpresspassword' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SU^>AhxvCgSBqLBdo}KgPL%Eqh{6Ep-HG}N=K5!ive 82Y:M I)(H*X2zN~g0%D4' );
define( 'SECURE_AUTH_KEY',  '#YP<8f(!0uy{13U~G#q|i5J~TZB6;piI|[; |9@zk,>J!bC#0Zg8>9|r+f*Zt-VH' );
define( 'LOGGED_IN_KEY',    '9Vn^%ewbUOCe1aVbnP(}w;#+$P!,41m1;_~wj;0$]l4|#4EJ^fY.]e35Z*aJ H!L' );
define( 'NONCE_KEY',        'f3;`bz8^:uq<}G{DO~V>?xAqj>Cro%`<M;zMj>xX4+p:>|[22!qRR]ekPfm`vPS6' );
define( 'AUTH_SALT',        '^$iBD.%f(S,y@}5oX_lfhvR%@57u:L@(g,fs,Es(>))GLfRgT$U3xsjH(v_E.=s.' );
define( 'SECURE_AUTH_SALT', 'uu/GU;LT#bRe4pY?_5%a1&+13&?}%~MEVj]di8.PQSw/-`w(oGjqAcC>eWrJ/oyY' );
define( 'LOGGED_IN_SALT',   '[*!Ccej9ZPoP#[]k/,E$CiXJc[XrVB-F[@VaSA#!V3~78#zDs~@B?ippgj+Bp:X:' );
define( 'NONCE_SALT',       'C2,mOD!lE~5RX5d`heGgfRJ[GCH70;rG(:?@N](0!/]wp$lD{{N35Y,#r~!r7d^3' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );
define('FS_METHOD','direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
