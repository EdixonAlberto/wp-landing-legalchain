<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'legalchain_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9F;[k.pNEFPP5gazQc+)cCp5W^7J~6iO(-#+v?Mg#tV@Je<a*bLI:V2j$WV^oxJl' );
define( 'SECURE_AUTH_KEY',  '_E;2vdaA?0=19_dka[KOiY-%5t|%ZD5Qos<$4t{7ziJhwoL]{YY-X<;w)6S(CjMg' );
define( 'LOGGED_IN_KEY',    '8w@m<t_o]a5Jd`6DhE~OhpB%, W^5v%Z J~xv-.QLqKf<6ClzB*S+eUs3i,rd4lT' );
define( 'NONCE_KEY',        'L9S(fZ={2{1+3X#)/07e&m|{vkMSm%moZdmiQx-3KGDxoIS/~Ky *q=^nel1%EY(' );
define( 'AUTH_SALT',        'cw+l+P4+g`xaI3-7H~]MxY0t[Kb+Q40]O7%9S.?6LE07}Qgr=.N@KOGir#>4Ur<T' );
define( 'SECURE_AUTH_SALT', 'xwFG_dt:pLR #:YZ1+wc|RJ@IN%Q*09SOc}wc-`v{M5H:2N^_ubeW6tW%ym`ejM^' );
define( 'LOGGED_IN_SALT',   '.C<D!;5)VN{D8N#CdV(YZu| I5?5[Eike1sPj*mz[csJM)je([?u8DUqvV-1e)tw' );
define( 'NONCE_SALT',       '-FQcz9cg?vbL_7ci~Byn<.:<zsr:s9n(<R~]Q,c%@voiE<AfhQ=kCgYaJNlVOUGn' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
