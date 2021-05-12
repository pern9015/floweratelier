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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pernillestrate_dk' );

/** MySQL database username */
define( 'DB_USER', 'pernillestrate_dk' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mlhjbakitiaa!' );

/** MySQL hostname */
define( 'DB_HOST', 'pernillestrate.dk.mysql' );

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
define( 'AUTH_KEY',         'KFG8gs0</%f=V)PhAiseY:lj_2F_4<l`2O^0ooM.0zabMM-w6p8})rO2@q(/4yfL' );
define( 'SECURE_AUTH_KEY',  '89|Gsu<AmHG,.yJ<[FMNV#^3eGnSf4&@@H|q1oB9C %6S<IzIJ(s_.U7_Ue#3p<9' );
define( 'LOGGED_IN_KEY',    'idA`JSyFq763(^9SI4&W&^(J<z%:=MPHa;j+wmj9,;y=MBi+~OW9GX`F_B.0>|E.' );
define( 'NONCE_KEY',        '%1l-sw`gcFa&2MNla8^Ow*-VUX0eA_zeF$*hd>Xm:>6A^$j=]*[ExR9264iIv:N{' );
define( 'AUTH_SALT',        'FN2 ]96>,eS9$ =M+@&Hu:6fBgCO5C]C=<Ltp}P^jZ;<#*{Hzgh[70vvUsNL~.gU' );
define( 'SECURE_AUTH_SALT', '>3I1.dRsl`6Y5M?z$H!,yD[3pZ`m/4T&5!6]jm;icU-/Ty9|@~mp6hw<?<F4n(a1' );
define( 'LOGGED_IN_SALT',   'TZ(n1/ubq5|xem&+Axe]2QU)_wPrE.Uk39emAdYDvAp}NmZq-g*IrP{NI[nTwPm8' );
define( 'NONCE_SALT',       'D,IoF T`02UXDoSB*!<gcsd$ _Bsh;POV[N)vA(g]]Rvmo$T=>%[`Ih%2idy`AI{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'floweratelier_wp_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
