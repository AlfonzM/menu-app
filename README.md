# Menu App Websystem

## Installation

### Laravel:

Make sure to install [Composer](https://getcomposer.org/download/).

```
$ git clone https://github.com/AlfonzM/menu-app.git
$ cd menu
$ cp .env.dist .env

// ... Edit database settings in .env file, e.g. DB host, user, pass etc

$ php composer.phar 

// ... Create `menudb` table in your database

$ php artisan migrate:install && php artisan migrate && php db:seed
$ php artisan serve
```

### React.JS:

```
$ cd view
$ npm install
$ npm run dev
```