<?php

namespace App\ValueObjects;

/**
 * Class MovieId
 * @package App\ValueObjects
 */
class MovieId extends ValueObject
{
    /** @var int */
    public $id;

    protected function __construct(int $id)
    {
        $this->id = $id;
    }

    public static function fromInt(int $id) : self
    {
        return new self($id);
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

}