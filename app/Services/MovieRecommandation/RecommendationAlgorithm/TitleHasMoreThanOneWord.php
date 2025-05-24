<?php

namespace App\Services\MovieRecommendation\RecommendationAlgorithm;

use App\Services\MovieRecommendation\RecommendationAlgorithm\RecommendationAlgorithm;

class TitleHasMoreThanOneWord implements RecommendationAlgorithm
{
    public function __invoke(array $movies): array
    {
        return array_filter($movies, function (string $title) {
            return str_word_count($title) > 1;
        });
    }
}