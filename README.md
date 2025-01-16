# Laravel Cloudflare Driver

## Installation

You can install the package via composer:

```bash
composer require adamrollinson/laravel-cloudflare-driver
```

In your `config/database.php` file, add the following to the `connections` array:

```php
'd1' => [
    'driver' => 'd1',
    'prefix' => '',
    'database' => env('CLOUDFLARE_D1_DATABASE_ID', ''),
    'api' => env('CLOUDFLARE_D1_API', 'https://api.cloudflare.com/client/v4'),
    'auth' => [
        'token' => env('CLOUDFLARE_TOKEN', ''),
        'account_id' => env('CLOUDFLARE_ACCOUNT_ID', ''),
    ],
],
````

In your `.env` file, add the following:

```dotenv
CLOUDFLARE_TOKEN=
CLOUDFLARE_ACCOUNT_ID=
CLOUDFLARE_D1_DATABASE_ID=
```

## Commands

```dotenv
php artisan d1:migrate
php artisan d1:migrate refresh
php artisan d1:migrate reset
php artisan d1:migrate rollback
php artisan d1:migrate status

php artisan make:d1 {name}
```

## Command Options

### d1:migrate
```dotenv
--connection= : The database connection to use
--force : Force the operation to run when in production
```

### make:d1
```dotenv
--name= : The name of the migration file
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Adam Rollinson](https://github.com/AdamRollinson)
- [Alex Renoki](https://github.com/renoki-co) - For the inspiration and base code for this package.
