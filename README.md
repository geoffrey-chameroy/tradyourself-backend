Installing Application
----------------------

#Docker
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

#Without docker
```bash
$> git clone https://github.com/Lymke/tradyourself-backend.git
$> composer install
$> php -S 127.0.0.1:8000 -t public
$> php bin/console server:run
```
The last two commands have to be launch in differents terminals

Database
------------
```bash
 php bin/console doctrine:fixtures:load
```


Run Application
------------

Application : http://localhost:10080 (for Docker) http://127.0.0.1:8001 (for without Docker)
PHPMyAdmin : http://localhost:10082
