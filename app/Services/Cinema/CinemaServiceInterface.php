<?php

namespace App\Services\Cinema;

interface CinemaServiceInterface
{
  public function getAll();
  public function store(array $attributes);
  public function destroy(int $id);
  public function addMovie(array $attributes);
  public function removeMovie(array $attributes);
  public function withMovies();
}
