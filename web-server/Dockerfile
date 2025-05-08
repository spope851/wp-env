FROM toasterlint/php-apache-mysql:latest

# Install MySQL extension and other required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install MySQL client
RUN apt-get update && apt-get install -y default-mysql-client && rm -rf /var/lib/apt/lists/*

# Install wp-cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

# Set PHP error reporting for wp-cli
ENV PHP_CLI_ERROR_REPORTING=0