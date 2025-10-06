<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
=======

class AppServiceProvider extends ServiceProvider
{
>>>>>>> master
    public function register(): void
    {
        //
    }

<<<<<<< HEAD
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //
    Route::middleware('web')
        ->group(base_path('routes/web.php'));

    Route::middleware('web')
        ->group(base_path('routes/auth.php'));
=======
    public function boot(): void
    {
        //
>>>>>>> master
    }
}
