<?php

namespace App\Services\MovieRecommendation\RecommendationAlgorithm;

interface RecommendationAlgorithm
{
    /**
     * @param string[] $movies
     */
    public function __invoke(array $movies): array;
}