FROM  php:8.3-fpm

ARG UID
ARG GID
ARG USER

ENV UID=${UID}
ENV GID=${GID}
ENV USER=${USER}
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    supervisor \
    nginx \
    build-essential \
    openssl \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zlib1g-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip
RUN docker-php-ext-install gd pdo pdo_mysql sockets

# MacOS staff group's gid is 20, so is the dialout group in alpine linux. We're not using it, let's just remove it.
RUN delgroup dialout
RUN groupadd -g ${GID} ${USER}
RUN useradd -m -u ${UID} -g ${GID} -s /bin/sh ${USER}
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
