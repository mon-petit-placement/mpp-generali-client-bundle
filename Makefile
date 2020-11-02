# PHPUnit commands

user=$(shell id -u)

composer-install:
	docker run --rm -it --volume ${PWD}:/app composer install

composer-update:
	docker run --rm -it --volume ${PWD}:/app composer update

.PHONY: phpunit
phpunit: vendor ./vendor/bin/phpunit ./phpunit.xml.dist
	rm -rf var
	docker run -u $(user):$(user) -v ${PWD}:/app -w /app --rm epcallan/php7-testing-phpunit:7.2-phpunit7 ./vendor/bin/phpunit --coverage-text
	rm -rf var

.PHONY: phpunit-functional
phpunit-functional: vendor ./vendor/bin/phpunit ./phpunit_functional.xml.dist
	docker-compose run --rm php ./vendor/bin/phpunit -c phpunit_functional.xml.dist --coverage-text $(options)
