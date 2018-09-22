<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Entity
 * @package App\Entities
 */
abstract class Entity implements Arrayable
{
    public abstract function getId() : int;
}