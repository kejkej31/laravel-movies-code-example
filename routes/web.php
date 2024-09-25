<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Movie\MovieRecommendationController;

Route::prefix('movie')->name('movie.')->group(function () {
    Route::get('recommendations', [MovieRecommendationController::class, 'recommend'])
        ->name('recommendations');
    Route::get('recommendations/algorithms', [MovieRecommendationController::class, 'getAvailableAlgorithms'])
        ->name('recommendation.algorithms');
});