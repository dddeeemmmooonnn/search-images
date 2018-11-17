# Docker
docker-start:
	docker-compose up -d --build
docker-stop:
	docker-compose stop
docker-bash:
	docker-compose exec app /bin/sh
docker-perms:
	sudo chown -R tikhon:www-data ./ && chmod -R g+w ./
