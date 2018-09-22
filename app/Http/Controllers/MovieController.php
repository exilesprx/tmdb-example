<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowMovieRequest;
use App\Http\Requests\ViewMoviesRequest;
use App\Http\Response;
use App\Http\Transformers\MovieTransformer;
use App\Repositories\MovieRepository;
use App\ValueObjects\MovieId;

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

    /** @var Response */
    private $response;

    public function __construct(Response $response, MovieRepository $repository, MovieTransformer $transformer)
    {
        $this->repo = $repository;

        $this->transformer = $transformer;

        $this->response = $response;
    }

    public function index(ViewMoviesRequest $request)
    {
        $movies = $this->repo->findMoviesByTitle($request->get('title'));

        return $this->response->collection($movies, $this->transformer);
    }

    public function show(ShowMovieRequest $request, int $movieId)
    {
        $movie = $this->repo->findMovieById(MovieId::fromInt($movieId));

        return $this->response->item($movie, $this->transformer);
    }
}