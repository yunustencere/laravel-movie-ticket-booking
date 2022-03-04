<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\Movie\MovieServiceInterface;

class MovieController extends Controller
{
    protected $service;
    public function __construct(
        MovieServiceInterface $service
    ) {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $movies = $this->service->getAll();
            return response()->json(['result' => 'success', 'movies' => $movies], 201);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $movie = $this->service->store($request->all());
            return response()->json(['result' => 'success', 'movie' => $movie], 201);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }
}
