<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       /*League/Fractal serializer should be ArraySerializer
        
       $this->app->build('League\Fractal\Manager', function()
       {
           $manager = new \League\Fractal\Manager;
           
           //use the serializer of your choice
           $manager->setSerializer(new \League\Fractal\Serializer\ArraySerializer());
           return $manager;
       });*/
    }
    
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
