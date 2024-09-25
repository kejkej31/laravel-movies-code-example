<?php

namespace App\Services\MovieRecommandation\RecommendationAlgorithm;

interface RecommendationAlgorithm
{
    /**
     * @param string[] $movies
     */
    public function __invoke(array $movies): array;
}