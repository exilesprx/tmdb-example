<?php

namespace App\ValueObjects;

use Illuminate\Support\Collection;
use Webmozart\Assert\Assert;

/**
 * Class TypedCollection
 * @package App\ValueObjects
 */
class TypedCollection extends Collection
{
    /** @var array */
    protected static $allowedTypes = [];

    public static function make($items = [])
    {
        foreach ($items as $item) {
            self::isOfAllowedType($item);
        }

        return new static($items);
    }

    public function push($item)
    {
        self::isOfAllowedType($item);

        parent::push($item);

        return $this;
    }

    private static function isOfAllowedType($item) : void
    {
        Assert::isInstanceOfAny($item, static::$allowedTypes);
    }
}