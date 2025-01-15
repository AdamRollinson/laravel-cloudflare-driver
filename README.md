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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Adam Rollinson](https://github.com/AdamRollinson)
- [Alex Renoki](https://github.com/renoki-co) - For the inspiration and base code for this package.
