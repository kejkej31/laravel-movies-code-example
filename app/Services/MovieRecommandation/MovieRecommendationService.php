<?php

namespace App\Services\MovieRecommandation;

use Illuminate\Support\Facades\Storage;
use App\Services\MovieRecommandation\RecommendationAlgorithmEnum;

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