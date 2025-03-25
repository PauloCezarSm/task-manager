# Usando uma imagem oficial do PHP com Apache
FROM php:8.1-apache

# Instalando dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Copiar os arquivos do projeto para o diretório correto no contêiner
COPY . /var/www/html/

# Definir a porta padrão para o Apache
EXPOSE 80

# Habilitar o mod_rewrite do Apache
RUN a2enmod rewrite

# Configurar o Apache para usar a configuração do projeto
COPY ./apache/vhost.conf /etc/apache2/sites-available/000-default.conf
