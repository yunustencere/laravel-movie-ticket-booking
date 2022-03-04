<?php

namespace App\Services\Movie;

interface MovieServiceInterface
{
    public function getAll();
    public function store(array $attributes);
}
