<?php

namespace App\Services\MovieRecommandation\RecommendationAlgorithm;

use Illuminate\Support\Arr;
use App\Services\MovieRecommandation\RecommendationAlgorithm\RecommendationAlgorithm;

class RandomThree implements RecommendationAlgorithm
{
    public function __invoke(array $movies): array
    {
        return Arr::random($movies, min(count($movies), 3));
    }
}