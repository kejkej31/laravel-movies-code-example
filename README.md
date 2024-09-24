## Original task
```
Napisz prostą aplikację w PHP do wyszukiwania rekomendacji filmów (wystarczy sama część backendowa). Lista filmów w formie tablicy jest dostarczona w pliku movies.php, możesz ją skopiować lub bezpośrednio dodać do Twojej aplikacji.

Aplikacja zawiera 3 algorytmy rekomendacji:

1) Zwracane są 3 losowe tytuły.

2) Zwracane są wszystkie filmy na literę ‘W’ ale tylko jeśli mają parzystą liczbę znaków w tytule.

3) Zwracany są wszystkie tytuły, które składają się z więcej niż 1 słowa.

Napisz testy jednostkowe, które sprawdzą poprawność rozwiązania.
```

## Notes on implementation
In my implentation I've used two patterns: Strategy and Factory. Most of the code related to the task can be found in `./app/Services/MovieRecommendation/` and `tests/Unit/MovieRecommendationServiceTest.php`
1) movies.php
I took the liberty of transforming it into a JSON.
2) RecommendationAlgorithmFactory
Instead of manually mapping enum value to implementation, we could do a fancier approach and autoload all algorithms from inside the directory
3) RandomThree algorithm
It wasn't specified what should happen when there's less than 3 movies; I've decided it should return 3 or less, but normally I'd leave a note about that for Product Owner

## How to start application
Install packages using `composer install`   
In root directory copy `.env.example` and save as `.env`   
Application by default will be visible under `http://127.0.0.1:8000/`. 
### Without docker
Run in root directory: `php artisan serve --port=8000`
### Docker 
Application uses default configuration of [Laravel Sail](https://laravel.com/docs/11.x/sail#main-content)   
To start application run in root directory:  `./vendor/bin/sail up -d`   
**Warning: First time can take a couple minutes, but subsequent starts will be much faster**   
You can change port by changing APP_PORT in `.env` file.

## API
If you'd like to test the API, there's two endpoints:
1) `http://127.0.0.1:8000/movie/recommendations?algorithm=random_three` - returns movies based on given algorithm
2) `http://127.0.0.1:8000/movie/recommendations/algorithms` - returns all the available algorithms

## Tests
Run tests with: `./vendor/bin/sail artisan test`
