<?php

namespace App\Services\MovieRecommandation\RecommendationAlgorithm;

use App\Services\MovieRecommandation\RecommendationAlgorithm\RecommendationAlgorithm;

class TitleHasMoreThanOneWord implements RecommendationAlgorithm
{
    public function __invoke(array $movies): array
    {
        return array_filter($movies, function (string $title) {
            return str_word_count($title) > 1;
        });
    }
}