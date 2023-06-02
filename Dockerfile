# Use a imagem base do PHP
FROM php:7.4-cli

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie os arquivos do projeto para o contêiner
COPY . /var/www/html

# Copie a pasta "vendor" do projeto local para o contêiner
COPY vendor /var/www/html/vendor

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=composer:latest /var/www/html/vendor /app/vendor


RUN docker-php-ext-install pdo pdo_mysql


# Instale as dependências adicionais

# Defina as permissões corretas para a pasta de armazenamento do Laravel
RUN chown -R www-data:www-data storage

# Exponha a porta 8000 (ou a porta que você deseja usar para o servidor Laravel)
EXPOSE 8000

# Execute o servidor Laravel usando o comando "php artisan serve"
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]


