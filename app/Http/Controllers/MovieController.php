<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowMovieRequest;
use App\Http\Requests\ViewMoviesRequest;
use Tmdb\Repository\MovieRepository;

/**
 * Class MovieController
 * @package App\Http\Controllers
 */
class MovieController
{
    private $repo;

    public function __construct(MovieRepository $repository)
    {
        $this->repo = $repository;
    }

    public function index(ViewMoviesRequest $request)
    {
        // TODO: Get all available movies
    }

    public function show(ShowMovieRequest $request, int $movieId)
    {
        $movie = $this->repo->getApi()->getMovie($movieId);

        // TODO: Use fractal transformer to convert the data into correct format
    }
}