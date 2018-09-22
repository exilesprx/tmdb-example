<?php

namespace App\ValueObjects;

/**
 * Class Cache
 * @package App\ValueObjects
 */
abstract class Cache extends ValueObject
{
    /** @var int */
    private $minutes;

    public function __construct(int $minutes)
    {
        $this->minutes = $minutes;
    }

    public function toInt() : int
    {
        return $this->minutes;
    }
}