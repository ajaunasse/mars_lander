# Setup ————————————————————————————————————————————————————————————————————————
DOCKER_COMPOSE = docker-compose
PHP = $(DOCKER_COMPOSE) exec php
SF = $(PHP) bin/console
COMPOSER = $(PHP) php -d memory_limit=-1 /usr/bin/composer


#docker
start:
	$(DOCKER_COMPOSE) build &&\
		$(DOCKER_COMPOSE) up -d

# Composer ————————————————————————————————————————————————————————————————————————
composer-install: composer.lock
	$(COMPOSER) install --no-progress --no-suggest --prefer-dist --optimize-autoloader

composer-update: composer.json
	$(COMPOSER) update

#Test unitaires ————————————————————————————————————————————————————————————————————————
unit_test:
	$(PHP) vendor/bin/phpunit tests

coverage:
	$(PHP) vendor/bin/phpunit tests --coverage-text
# —— Lint php —————————————————————————————————————————————————————
cs-fixer:
	$(PHP) vendor/bin/php-cs-fixer fix src