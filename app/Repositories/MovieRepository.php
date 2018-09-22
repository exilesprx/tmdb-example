<?php

namespace App\Repositories;

use App\Entities\Movie;
use App\ValueObjects\MovieCollection;
use App\ValueObjects\MovieId;
use Tmdb\Repository\MovieRepository as MovieClient;

/**
 * Class MovieRepository
 * @package App\Respositories
 */
class MovieRepository
{
    /** @var MovieClient */
    private $client;

    public function __construct(MovieClient $client)
    {
        $this->client = $client;
    }

    public function findMoviesByTitle(?string $title) : MovieCollection
    {
        $movies = $this->findAllMoviesPlayingNow();

        if (!$title) {
            return $movies;
        }

        return $movies->filter(function(Movie $value) use($title) {
           return $value->getTitle() == $title;
        });
    }

    protected function findAllMoviesPlayingNow() : MovieCollection
    {
        // TODO: Put in caching layer
        $movies = $this->client->getApi()->getNowPlaying();

        $collection = MovieCollection::make();

        foreach($movies['results'] as $movie)
        {
            $collection->push(
                new Movie($movie)
            );
        }

        return $collection;
    }

    public function findMovieById(MovieId $id) : Movie
    {
        $movie = $this->client->getApi()->getMovie($id->getId());

        return new Movie($movie);
    }
}