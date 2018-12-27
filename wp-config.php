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
define('DB_NAME', 'namcoi_blog_2019');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'pageworth123');

/** MySQL hostname */
define('DB_HOST', 'namnh.c5v4mopqe3rm.ap-southeast-1.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY', 'n[wEH5m~j`eCA0_]F|+!oytIoG;$Br}DZ+dMe8NT0/KrJ-B`0wQ,4HS0w96*[ FN');
define('SECURE_AUTH_KEY', '/q2S0i@X{`6V@WN5<R^benY4cmyV<z)d2v](;zkTHMJ.2Oi~L]V3g_k{eWAt8<~x');
define('LOGGED_IN_KEY', '2V}H[jQ[A+^lS/ NwdB}k_v/&aC,YvlYM82,QQHdB*_ .!7B|HQl{VnY?;P5>f0p');
define('NONCE_KEY', '1Vk;>)}?7M:k>9#yhmXF`@ioh,4g2T9bf;i.U%Kkm3D$g;#&jCvUIrU1aSU;>/1C');
define('AUTH_SALT', '>pV)A$H2tY$,>S*RS|z9(TyM9^j>f; 0jhL8Jq,89_vtA#f%ygj V#ag#SA4b57;');
define('SECURE_AUTH_SALT', 'n)01X>wVE#:D;W?QEdt,F< &u*mx!*ct5~0YZr{%M2b!!w#9>,91#.5H>WXqi!,h');
define('LOGGED_IN_SALT', '/2JjEd9`En:?.PN@Ot5+JSKZWTv5vdmlQX3J!yY+X47KPJDTqm~Zl&^XK57Odlf6');
define('NONCE_SALT', 'As_.=-`D@5Z& p..E`@rN;:FYE@Qb,_Bgm$T&sUlP*Q-&C7wh^+a&-dvvi8==03Z');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
