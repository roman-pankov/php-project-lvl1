install:
	php composer.phar install

validate:
	php composer.phar validate

brain-games:
	./bin/brain-games

brain-even:
	./bin/brain-even

lint:
	php composer.phar run-script phpcs -- --standard=PSR12 src bin
