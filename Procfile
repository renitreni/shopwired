release: php artisan migrate --force
release: php artisan queue:work
web: vendor/bin/heroku-php-apache2 public/
worker: php artisan queue:work --sleep=3 --tries=3 --timeout=90