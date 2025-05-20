APP_CONTAINER=laravel_app

install:
	docker exec -it $(APP_CONTAINER) composer create-project laravel/laravel="^11.0" .

permissions:
	docker exec -it $(APP_CONTAINER) chmod -R 775 storage bootstrap/cache
	docker exec -it $(APP_CONTAINER) chown -R www-data:www-data storage bootstrap/cache

key:
	docker exec -it $(APP_CONTAINER) php artisan key:generate

optimize:
	docker exec -it $(APP_CONTAINER) php artisan config:clear
	docker exec -it $(APP_CONTAINER) php artisan route:clear
	docker exec -it $(APP_CONTAINER) php artisan view:clear
	docker exec -it $(APP_CONTAINER) php artisan config:cache
	docker exec -it $(APP_CONTAINER) php artisan route:cache
	docker exec -it $(APP_CONTAINER) php artisan view:cache

migrate:
	docker exec -it $(APP_CONTAINER) php artisan migrate

up:
	docker-compose up -d --build

down:
	docker-compose down

clean:
	docker-compose down -v --remove-orphans
	sudo rm -rf src/*

bash:
	docker exec -u 1000 -it $(APP_CONTAINER) bash
