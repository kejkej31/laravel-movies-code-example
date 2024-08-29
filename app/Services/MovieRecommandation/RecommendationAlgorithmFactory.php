<?php

namespace App\Services\MovieRecommandation;

use App\Services\MovieRecommandation\RecommendationAlgorithmEnum;
use App\Services\MovieRecommandation\RecommendationAlgorithm\RecommendationAlgorithm;
use App\Services\MovieRecommandation\RecommendationAlgorithm\RandomThree;
use App\Services\MovieRecommandation\RecommendationAlgorithm\StartsWithWAndHasEvenLettersInTitle;
use App\Services\MovieRecommandation\RecommendationAlgorithm\TitleHasMoreThanOneWord;

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
        $class = $this->algorithmsMap[$algorithm->value];
        return new $class;
    }
}
