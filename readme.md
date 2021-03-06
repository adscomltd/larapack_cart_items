# LarapackCartItems

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require adscomltd/larapack_cart_items
```

## Setup

1. Publish routes

```bash
$ php artisan vendor:publish --provider="Adscom\LarapackCartItems\LarapackCartItemsServiceProvider" --tag="config"
```

2. Register routes from service providers
3. Extend CartService class and add singleton binding for instance \
Example:
```php
$this->app->singleton(CartService::class, UserCartService::class);
```

## Usage

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email aamatevosyan@edu.hse.ru instead of using the issue tracker.

## Credits

- [Armen Matevosyan][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/adscomltd/larapack_cart_items.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/adscomltd/larapack_cart_items.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/adscomltd/larapack_cart_items/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/adscomltd/larapack_cart_items
[link-downloads]: https://packagist.org/packages/adscomltd/larapack_cart_items
[link-travis]: https://travis-ci.org/adscomltd/larapack_cart_items
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/adscom
[link-contributors]: ../../contributors
