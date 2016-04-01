# Uploadcare for Laravel

This is a simple Laravel service provider for Uploadcare's [official PHP library.](https://github.com/uploadcare/uploadcare-php)

## Installation

First, add this to your `composer.json` file

```js
"require": {
    "illuminate/html": "5.*",
    "altitude/laravel-uploadcare": "~1.2"
}
```

Then, create `config/uploadcare.php` with the following

```php
<?php

return array(
    'public_key'  => 'YOUR_UPLOADCARE_PUBLIC_KEY_HERE',
    'private_key' => 'YOUR_UPLOADCARE_PRIVATE_KEY_HERE',
);
```

Finally, add the service provider and alias in your `config/app.php`

```php
'providers' => array(
    ...

    Illuminate\Html\HtmlServiceProvider::class,
    Altitude\LaravelUploadcare\LaravelUploadcareServiceProvider::class,
);

'aliases' => array(
    ...

    'Form' => Illuminate\Html\FormFacade::class,
    'HTML' => Illuminate\Html\HtmlFacade::class,
    'Uploadcare' => Altitude\LaravelUploadcare\Facades\Uploadcare::class,
);
```

And you should be good to go.

## Example

This Service extends [Uploadcare's API class](https://github.com/uploadcare/uploadcare-php/blob/master/src/Uploadcare/Api.php) so you can use any of its methods.

It also provides the form macro `Form::uploadcare($field_name, $value = null, $options = array())`.

**app/Http/routes.php**

```php

Route::get('/demo', function(){
    return View::make('demo/demo');
});

Route::post('/demo', function(){
    echo Uploadcare::getFile(Input::get('image'))->getUrl();
});

```

**resources/views/demo/demo.blade.php**

```php
<html>
<head>
    <title>Uploadcare Demo</title>
</head>
<body>
    <form method="POST" action="/demo">
        {!! Form::uploadcare('image', null, array('data-crop' => '3:4')) !!}
        <input type="submit">
    </form>
    {!! Uploadcare::scriptTag() !!}
</body>
</html>
```

For more information, please check the [offical documentation](https://github.com/uploadcare/uploadcare-php)

## License

[MIT license](http://opensource.org/licenses/MIT)
