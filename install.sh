#!/bin/sh
if [ $1 ]; then
    sed -i "s/DOMAINNAME/$1/I" Docker/apache/domain.conf
    sudo rm -R /etc/apt/keyrings
    sudo apt-get remove apache2 httpd nginx cron docker docker-engine docker.io containerd runc -y
    sudo apt-get update -y
    sudo apt-get install ca-certificates curl gnupg lsb-release -y
    sudo mkdir -p /etc/apt/keyrings
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
    echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
    sudo apt-get update -y
    sudo apt-get install cron docker-ce docker-ce-cli containerd.io docker-compose-plugin -y
    docker compose up -d
    docker exec -w /var/www/html app composer install
    docker exec -w /var/www/html app npm install
    docker exec app chmod -R 0777 /var/www/html/storage/
    docker exec app chmod -R 0777 /var/www/html/public/uploads
    docker exec -w /var/www/html app php artisan key:generate
    docker exec -w /var/www/html app php artisan migrate
    docker exec -w /var/www/html app php artisan db:seed
    sed -i "s/APP_ENV=local/APP_ENV=production/I" .env
    sed -i "s/APP_DEBUG=true/APP_DEBUG=false/I" .env
fi
