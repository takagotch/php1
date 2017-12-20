wordpress docker-compose;rails docker-compose
composeinstall
----------------------------------
cd my_wp
//docker-compose.yml
version: '3'
services:
  db:
    image: mysql:5.7
	volumes:
	  - db_data:/var/lib/mysql
	restart: always
	environment:
	  MYSQL_ROOT_PASSWORD: somewordpress
	  MYSQL_DATABASE: wordpress
	  MYSQL_USER: wordpress
	  MYSQL_PASSWORD: wordpress

  wordpress:
    depends_on:
	  - db
	image: wordpress:latest
	ports:
	  - "8000:80"
	restart: always
	environment:
	  WORDPRESS_DB_HOST: db:3306
	  WORDPRESS_DB_USER: wordpress
	  WORDPRESS_DB_PASSWORD: wordpress
volumes:
	db_data:
	
docker-compose up -d

-------------------------------------
//Dockerfile
FROM ruby:2.3.3
RUN apt-get update -qq && apt-get install -y build-essential libpq-dev nodejs
RUN mkdir /myapp
WORKDIR /myapp/Gemfile
ADD Gemfile /myapp/Gemfile
ADD Gemfile.lock /myapp/Gemfile.lock
RUN bundle install
ADD . /myapp


touch Gemfile.lock