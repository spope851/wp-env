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

/** Database username */
define( 'DB_USER', $_ENV["WP_DATABASE_USER"] );

/** Database password */
define( 'DB_PASSWORD', $_ENV["WP_DATABASE_PASSWORD"] );

/** Database hostname */
define( 'DB_HOST', $_ENV["WP_DATABASE_HOST"] . ":" . $_ENV["WP_DATABASE_PORT"] );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

// depending on your environment
define('WP_HOME', "http://localhost:8080/");
define('WP_SITEURL', "http://localhost:8080/");
/** The name of the database for WordPress */
define('DB_NAME', $_ENV["WP_DATABASE"]); // best to keep it the same as production
/* Disable WP Cron, we're handling this via cPanel instead */
define('DISABLE_WP_CRON', true);
define('WP_POST_REVISIONS', 5);
/* Disable the Theme & Plugin Editor */
define( 'DISALLOW_FILE_EDIT', true );
define( 'WP_CACHE', 'false' ); // Added by WP Rocket


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
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

define( 'WP_ENVIRONMENT_TYPE', 'local' );

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
// $table_prefix = 'wp_';
$table_prefix = 'dfs_'; // best to keep it the same as production

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

error_reporting(E_ALL & ~E_DEPRECATED)
/* uncomment for testing */
;define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define('WP_DEBUG_DISPLAY', false); // Prevents errors from showing on the site

/* Add any custom values between this line and the "stop editing" line. */

// Prevent WordPress from checking for updates
define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'WP_AUTO_UPDATE_CORE', false );

// For offline development
// Prevent WordPress from making external HTTP requests
define( 'WP_HTTP_BLOCK_EXTERNAL', true );
define( 'WP_ACCESSIBLE_HOSTS', '' );

// Disable WordPress.org API calls
define( 'WP_DISABLE_CRON', true );
define( 'DISABLE_WP_CRON', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
