<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider


{
    public const HOME = '/';
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        
        Paginator::useBootstrap();
        
    }
}
