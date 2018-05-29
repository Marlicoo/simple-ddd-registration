# bartech-simple-ddd-project

## Installation

```
git clone git clone https://marlicoo@bitbucket.org/marlicoo/bartech.git
cd bartech
docker-compose up -d
docker-compose exec php-fpm bash
composer install
php bin/console doctrine:migrations:migrate
```


