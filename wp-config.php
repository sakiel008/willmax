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
define( 'DB_NAME', 'wp_wilmax' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'q,Y?MP<npg2FBOACekZL<0hF>L6 z4tKwq%d;%#WKBs#}h<DH{.Xogpfv9uBEjb4' );
define( 'SECURE_AUTH_KEY',  'd6~^YAUf7?%YH(ip .b,+M4ZN%`ta:QH)@VjIhWBQYLOeRz$[N>t#HDqC7=yR;fG' );
define( 'LOGGED_IN_KEY',    '%+=i#gm&iSwQKD{s45SPIPw3+t4-7X*Ur5v0vz)m{a1Pt%s|5@a:[!VP)V&HV2uo' );
define( 'NONCE_KEY',        'u@  v~f{BKQ*^Ts&20J[#-.E*<UbGb|Y[ZB.%AI6 Ym<xv}{7%8MrV9UyXfwjbH-' );
define( 'AUTH_SALT',        '$E{Pf~,jq8sYiqi$#N9nh~YqXE>iPnQ(9AdKaWW QT(+o5$NK#RPdxQ1j!tc%exp' );
define( 'SECURE_AUTH_SALT', 'U?rv[FO{x;u-H&&h*<&#%)[nSAv73yi$Q?lo6o88mNx{>iQU847g>z*Ok^eP%iUd' );
define( 'LOGGED_IN_SALT',   'F|?cX~dZV`,t{WUfT`DNM;Wg,K0a,^X]*LOj5:q8~FtR~/kZ$j^pAA3@qq^NDw3z' );
define( 'NONCE_SALT',       'o>dAtasUWihlNPiossheC]$XJ4IZy ^GCUHVFM/6s y{!TR/>LxJR(&=+AV44qc]' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
