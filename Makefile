PHP_USER=utente
PROJECT=abac

build:
	docker compose --file ./docker/compose.yaml -p $(PROJECT) build

up:
	docker compose --file ./docker/compose.yaml -p $(PROJECT) up -d

down:
	docker compose --file ./docker/compose.yaml down

enter:
	docker compose -p $(PROJECT)  exec -u $(PHP_USER) -w /home/$(PHP_USER)/${PROJECT} php /bin/zsh

tests:
	docker compose -p $(PROJECT)  exec -u $(PHP_USER) -w /home/$(PHP_USER)/${PROJECT} php ./vendor/bin/phpunit