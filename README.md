Installing Application
----------------------

The easiest way to install this application is by using [Docker](https://www.docker.com/)

```bash
$> cp .env.dist .env
$> cp docker-compose.override.yml.dist docker-compose.override.yml
$> docker-compose up -d
```

After that you'll have to install dependencies and database with fixtures
```bash
$> docker-compose exec app composer install
$> docker-compose exec app php bin/console doctrine:database:create --if-not-exists
$> docker-compose exec app php bin/console doctrine:migrations:migrate -n
```

Run Application
------------

Application : http://localhost:10080
PHPMyAdmin : http://localhost:10082
