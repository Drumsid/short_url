#запуск докер приложений
setup:
	docker-compose up --build -d

#остановка докер приложений
stop:
	docker-compose down

#запуск композера внутри докера
install:
	docker exec -it url-short-php-fpm composer install

#заходим в bash
bash:
	 docker exec -it url-short-php-fpm  bash
