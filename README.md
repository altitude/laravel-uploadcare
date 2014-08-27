# Uploadcare for Laravel

This is a simple Laravel service provider for Uploadcare's official PHP library.

## Usage

First, add this to your `composer.json` file

```js
"require": {
    "altitude/laravel-uploadcare": "dev-master"
}
```

Then, add create `app/config/uploadcare.php` with the following

```php
<?php

return array(
    'public_key'  => 'YOUR_UPLOADCARE_PUBLIC_KEY_HERE',
    'private_key' => 'YOUR_UPLOADCARE_PRIVATE_KEY_HERE',
);
```

Finally, add the service provider and alias in your`app/config/app.php`

```php
'providers' => array(
    ...

    'Altitude\LaravelUploadcare\LaravelUploadcareServiceProvider',
);

'aliases' => array(
    ...

    'Uploadcare'      => 'Altitude\LaravelUploadcare\Facades\Uploadcare',
);
```

And you should be good to go.
