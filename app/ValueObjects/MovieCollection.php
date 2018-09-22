<?php

namespace App\ValueObjects;

use App\Entities\Movie;

/**
 * Class MovieCollection
 * @package App\ValueObjects
 */
class MovieCollection extends TypedCollection
{
    protected static $allowedTypes = [Movie::class];
}