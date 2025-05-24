<?php

namespace App\Services\MovieRecommendation;

use App\Services\MovieRecommendation\RecommendationAlgorithmEnum;
use App\Services\MovieRecommendation\RecommendationAlgorithm\RecommendationAlgorithm;
use App\Services\MovieRecommendation\RecommendationAlgorithm\RandomThree;
use App\Services\MovieRecommendation\RecommendationAlgorithm\StartsWithWAndHasEvenLettersInTitle;
use App\Services\MovieRecommendation\RecommendationAlgorithm\TitleHasMoreThanOneWord;

class RecommendationAlgorithmFactory
{
    protected array $algorithmsMap = [
        RecommendationAlgorithmEnum::RANDOM_THREE->value => RandomThree::class,
        RecommendationAlgorithmEnum::STARTS_WITH_W_EVEN_LETTERS->value => StartsWithWAndHasEvenLettersInTitle::class,
        RecommendationAlgorithmEnum::TITLE_MORE_THAN_ONE_WORD->value => TitleHasMoreThanOneWord::class,
    ];

    public function create(RecommendationAlgorithmEnum $algorithm): RecommendationAlgorithm
    {
        if (!array_key_exists($algorithm->value, $this->algorithmsMap))
        {
            throw new \InvalidArgumentException("Invalid recommendation algorithm: {$algorithm->value}");
        }
        return app($this->algorithmsMap[$algorithm->value]);
    }
}
