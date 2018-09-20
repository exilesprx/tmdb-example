<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowMovieRequest;
use App\Http\Requests\ViewMoviesRequest;
use App\Http\Transformers\MovieTransformer;
use League\Fractal\Resource\Item;
use Tmdb\Repository\MovieRepository;

/**
 * Class MovieController
 * @package App\Http\Controllers
 */
class MovieController
{
    /** @var MovieRepository */
    private $repo;

    /** @var MovieTransformer */
    private $transformer;

    public function __construct(MovieRepository $repository, MovieTransformer $transformer)
    {
        $this->repo = $repository;

        $this->transformer = $transformer;
    }

    public function index(ViewMoviesRequest $request)
    {
        // TODO: Get all available movies
    }

    public function show(ShowMovieRequest $request, int $movieId)
    {
        // TODO: Move logic out of controller and into an application service
        $movie = $this->repo->getApi()->getMovie($movieId);

        $resource = new Item($movie, $this->transformer);

        // TODO: Abstract the response function into its own class
        return response()->json($resource);
    }
}