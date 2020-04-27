# Installation

Install the package via composer:

```
composer require nh/starter-pack
```

Install the ui:

```
php artisan ui sp
```

Dumb the composer autoload:

```
composer dump-autoload
```

Migrate the basic databases and seed the default roles/permissions:

```
php artisan migrate
php artisan db:seed
```

Install the NPM packages and run the default js/scss:

```
npm install
npm run dev
```

# Commandes

## Users

You can create a new user:

```
php artisan user:new
```

## Contents

You can create a new content:

```
php artisan content:new
```

The commande will copy the default files that you needed. You can change them and then do:

```
php artisan migrate
```

Next, add you new model in:

- The config file : **backend.php**
- The translation file : **backend.php**

And enjoy !
