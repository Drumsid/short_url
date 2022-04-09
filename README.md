## Запуск

`make setup`

`make instal`

Добавляем конфиг для бд в .env файл можно посмотреть в docker-compose.yaml

Добавляем права при необходимости на папку `storage`

Проверяем в браузере [localhost:8088](http://localhost:8088/)

## Тест

Перед запуском тестов нужно убедится что есть файл .env.testing 
если его нет пишем `cp -n .env.example .env.testing || true`
и в нем настроен конфиг для тестовой базы данных который можно посмотреть 
в `docker-compose.yaml`
Так же в нем должен быть APP_KEY, если нет пишем

`php artisan key:generate --env=testing`

Запуск тестов
`make test`


## Конфиг
* **php** = 8.0-fpm 
* **nginx** = 1.17
* **postgres** = 12
* **pgadmin** = dpage/pgadmin4


## Возможные проблемы

Если есть проблемы с доступам к папкам,
`/storage/logs` и `/storage/frameworks` и `/bootstrap/cache`,
обычно бывает при работе на unix. Заходим на пк через терминал в рабочую
дерикторию и делаем следующее.


Заходим в корень проекта пишем:

`sudo chown -R $USER:$USER .`

`sudo chmod -R 775 .`

`sudo chmod -R 775 storage`

`sudo chmod -R ugo+rw storage`

далее:

`sudo chown -R www-data:www-data ./storage/logs/`

`sudo chown -R www-data:www-data ./storage/framework/`

`sudo chown -R www-data:www-data ./bootstrap/cache`

`sudo chmod -R 775 ./bootstrap/cache`

Если все равно есть проблемы делаем так

`sudo chown -R $USER:www-data storage`

`sudo chown -R $USER:www-data bootstrap/cache`

Затем

`chmod -R 775 storage`

`chmod -R 775 bootstrap/cache`


## pgadmin

Заходим в админку, по умолчанию [localhost:5050](http://localhost:5050/)
Логин: `admin@admin.com`
Пароль: `root`

Создаем подключение с БД которую создали через docker-compose, работаем.

Значение `host` указываем `postgres` или так, как прописано название сервиса у вас в docker-compose


### Не открывается pgadmin?

Скорее всего проблема с правами? заходим в папку `/docker` на компьютере через терминал и вводим команду

`sudo chown -R 5050:5050 pgadmin/`
