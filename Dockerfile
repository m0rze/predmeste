FROM php:8.1-apache
# Copy composer.lock and composer.json
#COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www/html
USER root
# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    default-mysql-client \
    locales \
    git \
    unzip \
    zip \
    curl \
    libonig-dev \
    libzip-dev \
    libxml2-dev \
    libssh2-1-dev \
    libssh2-1 \
    mc \
    python3 \
    python3-venv \
    libaugeas0

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl zip xml mysqli
# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash
RUN apt-get update && apt install nodejs

RUN python3 -m venv /opt/certbot/
RUN /opt/certbot/bin/pip install --upgrade pip
RUN /opt/certbot/bin/pip install certbot certbot-apache
RUN ln -s /opt/certbot/bin/certbot /usr/bin/certbot

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY ./Docker/apache/ /etc/apache2/conf-available/
COPY ./Docker/php/local.ini /usr/local/etc/php/conf.d/local.ini
#COPY ./ /var/www/html/

ENV DB_HOST=mysql
ENV DB_PASSWORD=iTYUI7*76oKVHJruyi3ol
ENV DB_DATABASE=app
ENV DB_USERNAME=root
RUN a2enmod rewrite
RUN a2enconf domain.conf
RUN service apache2 restart
