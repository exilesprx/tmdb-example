<?php

namespace App\ValueObjects;

/**
 * Class MovieNowPlayingCacheKey
 * @package App\ValueObjects
 */
class MovieNowPlayingCacheKey extends ValueObject
{
    /** @var string */
    private $key;

    protected function __construct(string $key)
    {
        $this->key = $key;
    }

    public static function fromDefault() : self
    {
        return new self("movies:now-playing");
    }

    public function __toString() : string
    {
        return $this->key;
    }
}