<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'punerealestate' );

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
define( 'AUTH_KEY',         'buUm7.(8Bw]O(9xdb0ojsD|cQxv)b0o`x>-z,Jy8=s)znB}VZ IN]Cn5B v~&ksf' );
define( 'SECURE_AUTH_KEY',  '.wZ6c&O0p=e/TWOeI2K=67W<{WAZFmTrq_T0KnMB4Rep,VIP;/JqqFE/t_&PqB*5' );
define( 'LOGGED_IN_KEY',    '$]Ak`mdj35.ug`Z03rQIF*+U w1HbdB72k?.C!?wMr^--/ZRH6^f6tVwr,eiEa*,' );
define( 'NONCE_KEY',        'vxwGB+_rQGjDLcD&[CAa]O|V*#fk98v]T89`G^Lm>^D43lT. f|(])]=n9Rw&!=#' );
define( 'AUTH_SALT',        '4T9wFdXWI?EfdSL$wR1X9WY|Md*B)`5bF>:B1jAQakflp$%3XzRYLd4h/N-bB=dK' );
define( 'SECURE_AUTH_SALT', 'p7.:O&5NXz^)V yhp|fX*~df( >g9cZ,J8LrUJ8F$MQJ0t+[XDX zye#xLo_]lqH' );
define( 'LOGGED_IN_SALT',   '$GRpqQ8JsO:bCCGQo%_LYwVpNu|R!}d-/0dSiip@} g)lIyG[E|d*4T0^cWpHp1t' );
define( 'NONCE_SALT',       'E=+Y1%AC#;#t^-M$cyQFr>)VyunF=(XVuYq1vVbMq=bLHD!`TpQ9vmB|~MdV`yzr' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
