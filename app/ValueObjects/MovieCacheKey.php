<?php

namespace App\ValueObjects;

/**
 * Class MovieCacheKey
 * @package App\ValueObjects
 */
class MovieCacheKey extends ValueObject
{
    /** @var string */
    private $key;

    protected function __construct(string $key)
    {
        $this->key = $key;
    }

    public static function fromMovieId(MovieId $movieId) : self
    {
        return new self(sprintf("movies:%d", $movieId->getId()));
    }

    public function __toString() : string
    {
        return $this->key;
    }
}