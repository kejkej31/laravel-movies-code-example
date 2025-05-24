<?php

namespace App\Services\MovieRecommendation\RecommendationAlgorithm;

use App\Services\MovieRecommendation\RecommendationAlgorithm\RecommendationAlgorithm;

class StartsWithWAndHasEvenLettersInTitle implements RecommendationAlgorithm
{
    public function __invoke(array $movies): array
    {
        return array_filter($movies, function (string $title) {
            return str_starts_with(strtolower($title), 'w') && strlen($title) % 2 === 0;
        });
    }
}