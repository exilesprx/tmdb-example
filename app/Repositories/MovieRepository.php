<?php

namespace App\Repositories;

use App\Entities\Movie;
use App\ValueObjects\MovieCacheKey;
use App\ValueObjects\MovieCacheTtl;
use App\ValueObjects\MovieCollection;
use App\ValueObjects\MovieId;
use App\ValueObjects\MovieNowPlayingCacheKey;
use Illuminate\Cache\CacheManager;
use Tmdb\Repository\MovieRepository as MovieClient;

/**
 * Class MovieRepository
 * @package App\Respositories
 */
class MovieRepository
{
    /** @var MovieClient */
    private $client;

    /** @var \Illuminate\Contracts\Cache\Store */
    private $cache;

    /** @var MovieCacheTtl */
    private $cacheTtl;

    public function __construct(MovieClient $client, CacheManager $cache, MovieCacheTtl $cacheTtl)
    {
        $this->client = $client;

        $this->cache = $cache->getStore();

        $this->cacheTtl = $cacheTtl;
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
        $key = MovieNowPlayingCacheKey::fromDefault();

        if (!$movies = $this->cache->get($key)) {
            $movies = $this->client->getApi()->getNowPlaying();

            $this->cache->put($key, $movies, $this->cacheTtl->toInt());
        }

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
        $key = MovieCacheKey::fromMovieId($id);

        if (!$movie = $this->cache->get($key)) {
            $movie = $this->client->getApi()->getMovie($id->getId());

            $this->cache->put($key, $movie, $this->cacheTtl->toInt());
        }

        return new Movie($movie);
    }
}