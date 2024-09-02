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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Artistisse' );

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
define( 'AUTH_KEY',         '3UGerw{,7yf7}$c<Py^@Vh;[>y&W8|nZT)AW+7$cL!]%N!XfTgvO`J9`qp#Y{3){' );
define( 'SECURE_AUTH_KEY',  'O@vw]5$9h8~=`@qKy:gNGtsJoQv)}`58 5##wYrkU5gz}hzypZkoXm:8U5@ihxI?' );
define( 'LOGGED_IN_KEY',    '+jT,G{4A.tQgmt8^wd3a=mStq(v<3Ct:e[EjXc?.H[LeJp[3QByi:%|AgO>QtM.T' );
define( 'NONCE_KEY',        '&x9H=Om_<zgC0!5T+PskwD~L-_EEqzofE7ro Sl7ppG]gok`3Hi@VKXXe|Tt|p`A' );
define( 'AUTH_SALT',        '3 I(C&*pbRQagRp-M0+9#Ab>3&_^%KQFvXt|D~~PeW/;&3O]0Cwn64dM=l7AUo{:' );
define( 'SECURE_AUTH_SALT', 't:C@pTH&yEP7Sit+Q qjiIpl+@%liVFmK=`7;|=UdlIr|0zs*IGs]<!l14{Do>R{' );
define( 'LOGGED_IN_SALT',   '4a(*fw`BLYh(/Nz|^6]L?V|X*csS)n;5K1*Kx::4m3kK.5to6zlvkZt([S_UI(9i' );
define( 'NONCE_SALT',       'ahhv~O7v9y;6*igrS<U@Qn_tSHQza0^hs;cAcBFSMMuMApzgx_s9;%4q|X{FNbe-' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
