<?php

namespace App\Providers;

use App\Models\Kangaroo;
use App\Repository\KangarooRepository;
use App\Services\KangarooService;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Added this as IDE helper for Eloquent Models
        if (config('app.env') === 'local') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        
        // Remove the automatic migration for personal access token
        Sanctum::ignoreMigrations();

        $this->app->bind(KangarooService::class, function ($app) {
            return new KangarooService(new KangarooRepository(new Kangaroo()));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
