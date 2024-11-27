# Spenpo WordPress Environment

## Requirements

- Docker
- Node.js

## Usage

```bash
npm run dev
```

* access the WordPress frontend at http://localhost:8080
* access phpmyadmin at http://localhost:8081

## Architecture

* the WrodPress frontend is run in the `web` container
* phpmyadmin is run in the `phpmyadmin` container
* the database is run locally or remotely

## WordPress

* this container mounts the WordPress source code from the `wordpress` directory
* the `wordpress` directory is ignored by git. you can download the latest version of WordPress from https://wordpress.org/latest.zip and extract it into the `wordpress` directory
* you can change the WordPress configuration in the `wordpress/wp-config.php` file
* to configure the database connection through the environment variables in the `web` container, copy the example file from `examples/wp-config.php` to `wordpress/wp-config.php`, or add the following to your `wordpress/wp-config.php` file:

```php
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV["WP_DATABASE"] );

/** Database username */
define( 'DB_USER', $_ENV["WP_DATABASE_USER"] );

/** Database password */
define( 'DB_PASSWORD', $_ENV["WP_DATABASE_PASSWORD"] );

/** Database hostname */
define( 'DB_HOST', $_ENV["WP_DATABASE_HOST"] );

/** Database port */
define( 'DB_PORT', $_ENV["WP_DATABASE_PORT"] );
```

## Database

* you need a MySQL database for WordPress to connect to
* you can run it locally or on a remote server
* either way, you need to know the public IP address of the database server
* if your database isn't running on the default port (3306), you can change the `WP_DATABASE_PORT` environment variable in the `docker-compose.yml` file
* you also need to create a database with the name specified in the `WP_DATABASE` environment variable. you can do this manually through your database management system, or by connecting to the database server with a MySQL client and running the following command:
* optionally, you can create a test database with the name specified in the `MYSQL_TEST_DATABASE` environment variable. if you have no use for it, leaving the variable there won't affect your WordPress installation

```sql
CREATE DATABASE IF NOT EXISTS `[CHOOSE_YOUR_DATABASE_NAME]`;
GRANT ALL PRIVILEGES ON `[CHOOSE_YOUR_DATABASE_NAME]`.* TO '[YOUR_USER]'@'%' IDENTIFIED BY '[YOUR_PASSWORD]';
FLUSH PRIVILEGES;
```

## Environment Variables

### System environment variables

* **IP** - the public IP address of the database server
    * if running locally, you can store your IP address in the `IP` variable of your shell by running `/utils/export-local-ip.sh`
        * you can also add the export-local-ip.sh script to your PATH so that you can just run `export-ip` to get your IP address
        * anytime you start a new shell, or move to a new network, you should run `export-ip` to set your new IP address before running `npm run dev`
    * if running remotely, you can set the `IP` environment variable in your shell, or just replace `$IP` in the `docker-compose.yml` file with your database server's public IP address before running `npm run dev`

### Docker environment variables

* **WP_DATABASE** - the name of the database for WordPress
* **WP_DATABASE_USER** - the username for the WordPress database
* **WP_DATABASE_PASSWORD** - the password for the WordPress database
* **WP_DATABASE_HOST** - the hostname of the database server
* **WP_DATABASE_PORT** - the port number of the database server
* **MYSQL_TEST_DATABASE** - the name of the test database

* **PMA_HOST** - the hostname of the database server (same as `WP_DATABASE_HOST`)
* **PMA_PORT** - the port number of the database server (same as `WP_DATABASE_PORT`)