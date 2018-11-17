# Instalation
1. Copy .env.dist to .env `cp .env.dist .env`
2. Configure database connection
3. Run `composer install`
4. Run `php bin/console doctrine:migrations:migrate`
