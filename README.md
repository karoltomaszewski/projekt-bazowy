Wymagania (trzeba mieć zainstalowane w systemie):
- docker
- yarn
- node (wraz z npm)

Kroki (instalacja):
1. sklonować repozytorium
2. wejść do katalogu `/src`
3. skopiować plik `.env.example` i nazwać kopieć `.env`
4. tak samo zrobić `env.testing`
   1. zmienić w nim `APP_ENV` na `testing`
   2. `DB_CONNECTION`na `sqlite`
5. uruchomić `docker-compose up`
6. wejść do terminala kontenera php
    1. uruchomić `composer install`
    2. uruchomić `php artisan key:generate
       1. skopiować wygenerowany klucz do env.testing
    3. uruchomić `php artisan migrate`
    4. uruchomić `php artisan db:seed`
    5. uruchomić `chmod -R 777 storage`
7. wrócić do katalogu `/src` i uruchomić `npm install`
8. uruchomić `npm run dev`

Strona powinna działać pod adresem: localhost:8001

Uruchamianie testów:
1. wejść do kontenera php
2. uruchomić `/vendor/bin/phpunit`


Kroki (pojedyncze uruchomienia):
1. uruchomić kontener dockera
2. przejść do katalogu `/src` i uruchomić `npm run dev`
