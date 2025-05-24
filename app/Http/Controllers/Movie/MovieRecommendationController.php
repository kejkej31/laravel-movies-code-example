<?php

namespace App\Http\Controllers\Movie;

use App\Services\MovieRecommendation\RecommendationAlgorithmEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Movie\MovieRecommendationRequest;
use App\Services\MovieRecommendation\MovieRecommendationService;

class MovieRecommendationController extends Controller
{
    public function __construct(
        public MovieRecommendationService $movieRecommendationService
    ) {
    }

    public function recommend(MovieRecommendationRequest $request)
    {
        return response()->json(
            $this->movieRecommendationService->recommend(
                RecommendationAlgorithmEnum::from($request->algorithm)
            )
        );
    }

    public function getAvailableAlgorithms()
    {
        return response()->json(
            $this->movieRecommendationService->getAvailableAlgorithms()
        );
    }
}
