<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Models\Product_category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     

      if (!app()->runningInConsole()) {

        $categories = Product_category::get();
        View::share('nav', $categories);
  
        $braintree_token = null;
          // if(request()->is('wallet')){

             // $gateway = new \Braintree\Gateway([
               //   'environment' => config('services.braintree.environment'),
                //  'merchantId' => config('services.braintree.merchantId'),
                 // 'publicKey' => config('services.braintree.publicKey'),
                 // 'privateKey' => config('services.braintree.privateKey')
             // ]);

             //  $braintree_token = $gateway->ClientToken()->generate();

          // } 

          View::share('braintree_token',$braintree_token);

          Blade::if('authguard', function ($guard) {
              return auth()->guard($guard)->check();
          });
      }
      
     
    }
}
