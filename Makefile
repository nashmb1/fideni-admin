CN=fideni_apache2_local

build:
	@docker build -t fideni_apache2 docker/.

run: build
	docker run --name=$(CN) -ti -v $(shell pwd):/var/www/app -v $(shell pwd)/docker/config:/etc/apache2/sites-enabled -p 8065:80 -d fideni_apache2

stop:
	docker stop $(CN) && docker rm $(CN)

bash:
	docker exec -ti $(CN) bash
