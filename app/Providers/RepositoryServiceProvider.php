<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\Permit\PermitRepository;
use App\Repositories\Permit\PermitRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(RoleRepositoryInterface::class,RoleRepository::class);       
        $this->app->singleton(UserRepositoryInterface::class,UserRepository::class);
      //  $this->app->singleton(PermissionRepositoryInterface::class,PermissionRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->singleton(PermitRepositoryInterface::class,PermitRepository::class);
        

    }
}
