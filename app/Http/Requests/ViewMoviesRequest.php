<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ViewMoviesRequest
 * @package App\Http\Requests
 */
class ViewMoviesRequest extends FormRequest
{
    public function rules() : array
    {
        return [];
    }

    public function authorize() : bool
    {
        return true;
    }
}