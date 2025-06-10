<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app\Repositories\Permission\PermissionRepository;
use App\Repositories\Permission\PermissionRepositoryInterface;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
    }
}
