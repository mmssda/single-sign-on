<?php

namespace App\Providers;

use App\Services\LoginServiceInterface;
use App\Services\Impl\OwnerLoginService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
  
    public function register()
    {
         $this->app->singleton(LoginServiceInterface::class, OwnerLoginService::class);
    }

    public function provides():array
    {
        return [LoginServiceInterface::class];
    }
   

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
