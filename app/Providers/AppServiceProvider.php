<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use App\Services\MovieRecommandation\MovieRecommendationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            MovieRecommendationService::class,
            function ($app) {
                return new MovieRecommendationService(
                    $app->make(\App\Services\MovieRecommandation\RecommendationAlgorithmFactory::class),
                    Storage::json('movies.json')
                );
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
