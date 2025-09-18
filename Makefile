test:
	@./vendor/bin/phpunit --colors tests

lint:
	@./vendor/bin/phpcs --standard=PSR12 ./src
