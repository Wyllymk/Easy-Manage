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
define( 'DB_NAME', 'easy-manage' );

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
define( 'AUTH_KEY',         '#q> kk6)`HnxPfFrc2kVF5/#Dk?u[v#JAs3a=)C2)yXn(>0&^R$9{h$B*hbPh<Bi' );
define( 'SECURE_AUTH_KEY',  '_Cc|CQK|;/0YN!P_rO>r62SNi`0$M(?luh{$uTTmxAj_ipu2^IK67Fi<vhPYk9ty' );
define( 'LOGGED_IN_KEY',    '-kdrh43/paS]tWiJ*PhB7xW`!/kR^>RR9dx:3K=#Oh1;-A!:s^Es>8a%k{_SBiid' );
define( 'NONCE_KEY',        'skcdt17!Ci/[{Y*}e,]yT~tYKC!i[v[@[.wStp1V2_-Kz-nCz@h|cM|%6~GgX6-i' );
define( 'AUTH_SALT',        'u+asEDIO0=d#i>mNI}s%Kf4fANn+=l;bZ79&<PHvD?MBFdQj9uEk=g5eLmPe@T8P' );
define( 'SECURE_AUTH_SALT', 'If23m~>LOOvy+-h)X#z%tNs&pCxZrV5bE^Ttq:l61`Y3I`_T1ax~<7n2/u&./{g%' );
define( 'LOGGED_IN_SALT',   '=ZhQ<iNShz[&EWID{rJV--$!VUH>c&y-z;{.YR&,v^Yl10/iH77:a>s<Aw%{[|Pt' );
define( 'NONCE_SALT',       ';=@&7DeE=o3LYfnDbU>f~]C))LLo7qg$X~Olr%1qqHGK,{qo(^<ZPJF([:,~%9E`' );

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
define( 'WP_DEBUG', true );

define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
