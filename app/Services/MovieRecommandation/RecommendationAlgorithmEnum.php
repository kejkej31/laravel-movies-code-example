<?php

namespace App\Services\MovieRecommandation;

/**
 * New cases should be also added to the RecommendationAlgorithmFactory
 */
enum RecommendationAlgorithmEnum: string
{
    case RANDOM_THREE = 'random_three';
    case STARTS_WITH_W_EVEN_LETTERS = 'starts_with_w_even_letters';
    case TITLE_MORE_THAN_ONE_WORD = 'title_more_than_one_word';
}