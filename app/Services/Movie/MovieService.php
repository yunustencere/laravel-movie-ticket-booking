<?php

namespace App\Services\Movie;

use App\Models\Movie;

class MovieService implements MovieServiceInterface
{
    public function getAll()
    {
        return Movie::all();
    }

    public function store(array $attributes)
    {
        return Movie::create($attributes);
    }
}
