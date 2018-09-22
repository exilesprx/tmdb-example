<?php

namespace App\ValueObjects;

/**
 * Class ValueObject
 * @package App\ValueObjects
 */
abstract class ValueObject
{
    public function isSameAs(ValueObject $object)
    {
        return ($object instanceof self);
    }
}