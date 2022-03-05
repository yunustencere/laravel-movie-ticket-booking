<?php

namespace App\Services\Cinema;

use App\Models\Cinema;
use Illuminate\Http\Exceptions\HttpResponseException;

class CinemaService implements CinemaServiceInterface
{
    public function getAll()
    {
        return Cinema::all();
    }

    public function filter(array $attributes)
    {
        return Cinema::filter($attributes)->with('movies')->get();
    }

    public function store(array $attributes)
    {
        $cinema = Cinema::create($attributes);
        $cinema->movies()->attach($attributes['movie_ids']);
        return $cinema;
    }

    public function destroy(int $id)
    {
        return Cinema::destroy($id);
    }

    public function addMovie(array $attributes)
    {
        $cinema = Cinema::where('id', $attributes['cinema_id'])->first();
        $cinema_movies = $cinema->movies()->pluck('movies.id')->toArray();
        if (in_array($attributes['movie_id'], $cinema_movies))
            throw new HttpResponseException(response()->json([
                'errors' => "Film already exists in that cinema."
            ], 422));
        $cinema->movies()->attach($attributes['movie_id']);
        return Cinema::where('id', $attributes['cinema_id'])->with('movies')->first();
    }

    public function removeMovie(array $attributes)
    {
        $cinema = Cinema::where('id', $attributes['cinema_id'])->first();
        if ($cinema->movies()->count() <= 2)
            throw new HttpResponseException(response()->json([
                'errors' => "A cinema must have at least 2 movies."
            ], 422));
        $cinema->movies()->detach($attributes['movie_id']);
        return Cinema::where('id', $attributes['cinema_id'])->with('movies')->first();
    }
}
