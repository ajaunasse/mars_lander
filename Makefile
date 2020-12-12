# Setup ————————————————————————————————————————————————————————————————————————
DOCKER_COMPOSE = docker-compose
PHP = $(DOCKER_COMPOSE) exec php
SF = $(PHP) bin/console
COMPOSER = $(PHP) php -d memory_limit=-1 /usr/bin/composer


# Composer ————————————————————————————————————————————————————————————————————————
composer-install: composer.lock
	$(COMPOSER) install --no-progress --no-suggest --prefer-dist --optimize-autoloader

composer-update: composer.json
	$(COMPOSER) update

#Test unitaires ————————————————————————————————————————————————————————————————————————
tests:
	$(PHP) vendor/bin/phpunit test

coverage:
	$(PHP) vendor/bin/phpunit test --coverage-text
# —— Lint php —————————————————————————————————————————————————————
cs-fixer:
	$(PHP) vendor/bin/php-cs-fixer fix src