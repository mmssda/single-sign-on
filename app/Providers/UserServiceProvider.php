<?php

namespace App\Providers;


use App\Services\Contracts\AppServiceInterface;
use App\Services\Contracts\OwnerServiceInterface;
use App\Services\Contracts\ModulServiceInterface;
use App\Services\Contracts\ApplicationUserInterface;

use App\Services\Impl\ApplicationUserService;
use App\Services\Impl\AppService;
use App\Services\Impl\OwnerLoginService;
use App\Services\Impl\ModulService;

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
        // singleton bindings
         $this->app->singleton(ApplicationUserInterface::class, ApplicationUserService::class);
         $this->app->singleton(AppServiceInterface::class, AppService::class);
         $this->app->singleton(ModulServiceInterface::class, ModulService::class);
         $this->app->singleton(OwnerServiceInterface::class, OwnerLoginService::class);
    }

    public function provides():array
    {
        // Daftar service yang disediakan
        return [AppServiceInterface::class, ModulServiceInterface::class,OwnerServiceInterface::class, ApplicationUserInterface::class];
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
