# Bad Browser Detect for Laravel 5.4+

Determine the minimum acceptable version of the browser and notify the user if the version does not match the required version.

![bad-browser-detect](https://user-images.githubusercontent.com/10347617/38484736-37cae152-3be0-11e8-9447-aff0e20fee46.png)

<p align="center">
<a href="https://travis-ci.org/andrey-helldar/bad-browser-detect"><img src="https://travis-ci.org/andrey-helldar/bad-browser-detect.svg?branch=master&style=flat-square" alt="Build Status" /></a>
<a href="https://packagist.org/packages/andrey-helldar/bad-browser-detect"><img src="https://img.shields.io/packagist/dt/andrey-helldar/bad-browser-detect.svg?style=flat-square" alt="Total Downloads" /></a>
<a href="https://packagist.org/packages/andrey-helldar/bad-browser-detect"><img src="https://poser.pugx.org/andrey-helldar/bad-browser-detect/v/stable?format=flat-square" alt="Latest Stable Version" /></a>
<a href="https://packagist.org/packages/andrey-helldar/bad-browser-detect"><img src="https://poser.pugx.org/andrey-helldar/bad-browser-detect/v/unstable?format=flat-square" alt="Latest Unstable Version" /></a>
<a href="https://github.com/andrey-helldar/bad-browser-detect"><img src="https://poser.pugx.org/andrey-helldar/bad-browser-detect/license?format=flat-square" alt="License" /></a>
</p>


<p align="center">
<a href="https://www.versioneye.com/php/andrey-helldar:bad-browser-detect/dev-master"><img src="https://www.versioneye.com/php/andrey-helldar:bad-browser-detect/dev-master/badge?style=flat-square" alt="Dependency Status" /></a>
<a href="https://styleci.io/repos/45746985"><img src="https://styleci.io/repos/75637284/shield" alt="StyleCI" /></a>
<a href="https://php-eye.com/package/andrey-helldar/bad-browser-detect"><img src="https://php-eye.com/badge/andrey-helldar/bad-browser-detect/tested.svg?style=flat" alt="PHP-Eye" /></a>
</p>


## Installation

To get the latest version of Laravel Beautiful Phone, simply require the project using [Composer](https://getcomposer.org):

```
composer require andrey-helldar/bad-browser-detect
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "andrey-helldar/bad-browser-detect": "^1.0"
    }
}
```

If you don't use auto-discovery, add the `ServiceProvider` to the providers array in `config/app.php`:

```php
Helldar\BadBrowser\ServiceProvider::class,
```

You can also publish the config file to change implementations (ie. interface to specific class):

```
php artisan vendor:publish --provider="Helldar\BadBrowser\ServiceProvider"
```

In some cases, we can modify the CSS page styles, so periodically check the relevance of the data. This can also be done using the command:

```
php artisan vendor:publish --tag=assets
```

Next, call the command `php artisan migrate` to create a table in the database.


## Using

In the `config/bad_browser.php` settings file, specify the minimum permissible versions of browsers for the normal operation of your site.

Now, if a user logs in from an outdated browser, it automatically redirects to the page `/bad-browser`. On this page, the user can click on the link to download a modern browser, or notify the administrator about the version detection error. In this case, the user's user-agent information will be recorded in the database, and an email notification of the incident will be sent to you.


## Copyright and License

`Bad Browser Detect` was written by Andrey Helldar for the Laravel Framework 5.4 and later, and is released under the MIT License. See the [LICENSE](LICENSE) file for details.
