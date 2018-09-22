<?php

namespace App\Entities;

/**
 * Class Movie
 * @package App\Entities
 */
class Movie extends Entity
{
    /** @var int */
    private $id;

    /** @var string */
    private $language;

    /** @var string */
    private $title;

    /** @var string */
    private $overview;

    /** @var int */
    private $popularity;

    public function __construct(array $data)
    {
        $this->id = array_get($data, 'id');

        $this->language = array_get($data, 'original_language');

        $this->title = array_get($data, 'original_title');

        $this->overview = array_get($data, 'overview');

        $this->popularity = array_get($data, 'popularity');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @return int
     */
    public function getPopularity(): int
    {
        return $this->popularity;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'language' => $this->language,
            'title' => $this->title,
            'overview' => $this->overview,
            'popularity' => $this->popularity
        ];
    }
}