<?php

namespace App\Services\MovieRecommendation;

use Illuminate\Support\Facades\Storage;
use App\Services\MovieRecommendation\RecommendationAlgorithmEnum;

class MovieRecommendationService
{
    public function __construct(
        protected RecommendationAlgorithmFactory $algorithmFactory,
        protected array $movies
    ) {

    }

    public function recommend(RecommendationAlgorithmEnum $algorithm)
    {
        $algorithm = $this->algorithmFactory->create($algorithm);
        return array_values($algorithm($this->movies));
    }

    public function getAvailableAlgorithms(): array
    {
        return RecommendationAlgorithmEnum::cases();
    }
}