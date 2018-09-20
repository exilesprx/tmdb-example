<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ShowMovieRequest
 * @package App\Http\Requests
 */
class ShowMovieRequest extends FormRequest
{
    public function rules() : array
    {
        return [];
    }

    public function authorize() : bool
    {
        // Already passed basic auth, can define granular permissions
        return true;
    }
}