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
define( 'DB_NAME', 'blog' );

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
define( 'AUTH_KEY',         'h#pjaOnQ<OLL`^BBWf&+4]<3F`z#`-5<]t9eH}c6?kOR%t(}4doRg}=h.j[!mA#F' );
define( 'SECURE_AUTH_KEY',  'Mu*b+926ITnZg@[bmuT}vhSb++zp ^c;Be2s4kB0-f7HZXG}xt;PZzXu=&r*2B*,' );
define( 'LOGGED_IN_KEY',    'Tx8zpASCTu6]*&}He/`0frG7uLaX2M0X}m=dK)jKp::=fo}~O1>FEk3c7>Ci;vE4' );
define( 'NONCE_KEY',        '>7)2d(I 5sxJ(*8g9|tM?IzCr{ MIgE%&KH+V/yCDUm<b%hi>0{RQVeIz0e9V7wk' );
define( 'AUTH_SALT',        't9<2+uo>jCjM6A:DQ!uL1#!yE2Qy[2]/I,AsKGH5W?_vK[YP) Z7rMVx?[#Tw=)2' );
define( 'SECURE_AUTH_SALT', 'l%s,j#}b|W26o/Pez&-xj`#W&C^I^a::S m3#KZ!}w5h=-5W Siu!>ZpgchNSPZ~' );
define( 'LOGGED_IN_SALT',   '1:+oVA(w>a3VsuTu2/2Kqp-/>C)[Eh#>p{AL<Jz8k3NXF<*YHaMtEO+Eok519%%p' );
define( 'NONCE_SALT',       '_[/m[ja TgnXj, |+0,PJBB?>p,O@%v@$ERL2$:h@rR$>i7`Mz$GQ9{HkUX:4K#e' );

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
