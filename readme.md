# **WebSTAMP**

WebSTAMP is intended to become an STAMP tool, offering support to STPA (Systems- Theoretic Process Analysis), STPA-Sec (STPA for Security) and other analysis techniques that are based on STAMP. WebSTAMP currently provides an environment to safety analysts to complete and review their STPA analysis. The tool is aimed to help beginner safety analysts to understand STPA and complete their analyis in a whole. We believe that the tool can speed up the analysis of expert analysts.
WebSTAMP was created to provide an environment for safety analysts to perform a complete STPA analysis. The tool embraces two approaches: The first one is a rule-based approach developed by Gurgel et al. to help analysts to find unsafe control actions. The second approach provides a list of generic scenarios, associated causal factors, requirements and rationale based on the type of unsafe control action. The analyst can choose existing scenarios and create new ones. This feature enables a more systematic and comprehensive analysis.

## **Prerequisites**

There are two ways to execute WebSTAMP: (i) Using Docker or; (ii) Installing the dependencies in your machine.

If you intend to install WebSTAMP using Docker, you need to install [Docker (preferably the latest version)](https://www.docker.com/products/docker-desktop) and [Git (latest version)](https://git-scm.com/downloads).
Otherwise, you will need to install the following dependencies: [Composer (latest version)](https://getcomposer.org/download/), [Node.js (exactly version 8.11.1)](https://nodejs.org/ja/blog/release/v8.11.1/), [Git (latest version)](https://git-scm.com/downloads), and [PHP (7.4)](https://www.php.net/downloads.php).

## **Installation (using Docker)**
Open a terminal to clone the repository

```
git clone https://github.com/felliperey/webstamp
```

In the webstamp folder, create a new .env file. You can use the content available on the file .env.example.

In the terminal (make sure that you are in the webstamp folder and Docker is running), execute the following command:

```
docker-compose up -d --build
```

Once the command is finished running, you need to access the "webstamp-app" container to install composer dependencies to execute Laravel:

```
docker exec -i -t webstamp-app /bin/bash
composer update
```

After that, you will be able to access the WebSTAMP (localhost:8000)

## **Installation (without Docker)**

Open a terminal to clone the repository

```
git clone https://github.com/felliperey/webstamp
```


In webstamp folder, we need install Gulp, an automated task runner. Typing the command below, a new folder (node_modules) will be created with the content of Gulp.

```
npm install -g gulp
```


To install the remaining dependencies, execute the command:

```
npm install
```


To install the composer dependencies for Laravel, execute the command:

```
composer install
```


Gulp is the responsible to get all views, css, images and javascripts files(folder resources), compile them and send to the public folder.

```
gulp
```



**Attention!**

1. Create a new .env file. Copy the content of .env.example and modify using your database configuration


2. Create a schema in your database named "stpatool"


3. To create all tables automatically, just type:

```
php artisan migrate --seed
```


A new key must be generated for the new Laravel application. 

```
php artisan key:generate
```

## **Running the application**

After complete the Installation, you must open two terminals and execute the commands:

```
php artisan serve
```
and
```
gulp watch
```

**Attention! ** If you don't intend to modify the source code (mainly the resources folder), it is not necessary to run the second command (gulp watch)
