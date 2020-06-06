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
define( 'DB_NAME', 'iglesiaifc' );

/** MySQL database username */
define( 'DB_USER', 'forge' );

/** MySQL database password */
define( 'DB_PASSWORD', 'HbK3CJVIhe83urtDQ7x2' );

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
define( 'AUTH_KEY',         'ZgLL{7PaRA8zSE2#ql?T(>BCzs}7JNyL(T6NCIaz#1L87I.7C4O6LZgur!q2Y|EN' );
define( 'SECURE_AUTH_KEY',  ',7F&bq`vcNY<1Vyh18&x_=!u@SeZUhL@yiZDp1#m.MW*z|c*(2Ty)SJ6=rh0+#E7' );
define( 'LOGGED_IN_KEY',    '{%=Ru{vT%!lO}Y z0S5~zf4yy^>}kg~M/@sSQ<-C=I}+}q0encY5f__z;ksAB@fk' );
define( 'NONCE_KEY',        'oo4K;<9S:?T5P#z~S6l+7p4CI<tr_H{|OtZA#aL<E.*gn*PP(^eS>;xm@7~D*ss[' );
define( 'AUTH_SALT',        'lS#aNOQ:+Y[MK5pR1:Y3#Rhifi8:`1&p&u/F4dqHg|.Lr5Ix6Be7:Y[bPa#x7@et' );
define( 'SECURE_AUTH_SALT', 'k7U!MFXV`+`w+9UYDPy{*fzl32&(6DFE0E(%F+:@7sO8IG2AFI6!b9WJiJpe>Y<W' );
define( 'LOGGED_IN_SALT',   'BqJUz9RK_,6Lg4G,lE!kWVdQO8/Rh:8uw1<5X9S&+|0Yf~LHPJ|M={gNmM_bHV6H' );
define( 'NONCE_SALT',       ':Su#kNm.a7vjoDRGNE{G]N~.~ANpFdtu18k9Hb&^z6D#z2q*3xKpSI&0wJ[ub6Q~' );

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

define('DISALLOW_FILE_EDIT', true);
define('DISALLOW_FILE_MODS', true);
