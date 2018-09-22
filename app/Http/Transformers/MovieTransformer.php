<?php
namespace App\Http\Transformers;

use App\Entities\Movie;
use League\Fractal\TransformerAbstract;

/**
 * Class MovieTransformer
 * @package App\Http\Transformers
 */
class MovieTransformer extends TransformerAbstract
{
    public function transform(Movie $movie) : array
    {
        // Just returning the movie for now as I don't know the data structure
        return $movie->toArray();
    }
}