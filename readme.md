This is a Laravel 5 package that provides social_stream management facility for lavalite framework.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `malacode/social_stream`.

    "malacode/social_stream": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

```php
Malacode\SocialStream\Providers\SocialStreamServiceProvider::class,

```

And also add it to alias

```php
'SocialStream'  => Malacode\SocialStream\Facades\SocialStream::class,
```

Use the below commands for publishing

Migration and seeds

    php artisan vendor:publish --provider="Malacode\SocialStream\Providers\SocialStreamServiceProvider" --tag="migrations"
    php artisan vendor:publish --provider="Malacode\SocialStream\Providers\SocialStreamServiceProvider" --tag="seeds"

Configuration

    php artisan vendor:publish --provider="Malacode\SocialStream\Providers\SocialStreamServiceProvider" --tag="config"

Language

    php artisan vendor:publish --provider="Malacode\SocialStream\Providers\SocialStreamServiceProvider" --tag="lang"
    
Assets

    php artisan vendor:publish --provider="Malacode\SocialStream\Providers\SocialStreamServiceProvider" --tag="assets"    

Views public and admin

    php artisan vendor:publish --provider="Malacode\SocialStream\Providers\SocialStreamServiceProvider" --tag="view-public"
    php artisan vendor:publish --provider="Malacode\SocialStream\Providers\SocialStreamServiceProvider" --tag="view-admin"

Publish admin views only if it is necessary.

## Usage


