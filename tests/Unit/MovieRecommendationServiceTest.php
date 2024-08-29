<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use App\Services\MovieRecommandation\MovieRecommendationService;
use App\Services\MovieRecommandation\RecommendationAlgorithmEnum;

class MovieRecommendationServiceTest extends TestCase
{
    public function testReturnsAllAvailableCases(): void
    {
        $service = app()->makeWith(MovieRecommendationService::class, [
            'movies' => ['movie']
        ]);
        $this->assertEquals(RecommendationAlgorithmEnum::cases(), $service->getAvailableAlgorithms());
    }

    #[DataProvider('provider')]
    public function testReturnsRecommendations(
        RecommendationAlgorithmEnum $algorithm,
        array $movies,
        int $expectedCount,
        ?int $expectedMovieIndex,
        ?int $incorrectMovieIndex
    ) {
        $service = $this->makeRecommendationService($movies);
        $recommendations = $service->recommend($algorithm);
        $this->assertCount($expectedCount, $recommendations);
        if ($expectedMovieIndex !== null)
        {
            $this->assertContains($movies[$expectedMovieIndex], $recommendations);
        }
        if ($incorrectMovieIndex !== null)
        {
            $this->assertNotContains($movies[$incorrectMovieIndex], $recommendations);
        }
    }

    public static function provider()
    {
        return [
            'RandomThree' => [
                RecommendationAlgorithmEnum::RANDOM_THREE,
                ['movie1', 'movie2', 'movie3', 'movie4', 'movie5'],
                3,
                null,
                null
            ],
            'RandomThreeButNotEnoughMovies' => [
                RecommendationAlgorithmEnum::RANDOM_THREE,
                ['movie1', 'movie2'],
                2,
                null,
                null
            ],
            'TitleMoreThanOneWord' => [
                RecommendationAlgorithmEnum::TITLE_MORE_THAN_ONE_WORD,
                ['movie1', 'movie2', 'Two words', 'two words'],
                2,
                2,
                0
            ],
            'StartsWithWAndEvenLetters' => [
                RecommendationAlgorithmEnum::STARTS_WITH_W_EVEN_LETTERS,
                ['W Odd', 'w Odd', 'W Even', 'w Even'],
                2,
                2,
                0
            ],
        ];
    }

    private function makeRecommendationService(array $movies): MovieRecommendationService
    {
        return app()->makeWith(MovieRecommendationService::class, [
            'movies' => $movies
        ]);
    }
}
