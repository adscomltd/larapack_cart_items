<?php

namespace Adscom\LarapackCartItems;

use Illuminate\Support\ServiceProvider;

class LarapackCartItemsServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    if ($this->app->runningInConsole()) {

      $this->publishes([
        __DIR__.'/../routes/larapack_cart_items.php.stub' => base_path('routes/larapack_cart_items.php'),
      ], 'route');

    }
  }
}
