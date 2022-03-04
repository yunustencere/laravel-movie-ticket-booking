<?php

namespace App\Http\Controllers\Cinema;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use Illuminate\Http\Request;
use App\Services\Cinema\CinemaServiceInterface;

class CinemaController extends Controller
{
    protected $service;
    public function __construct(
        CinemaServiceInterface $service
    ) {
        $this->service = $service;
    }

    public function index()
    {
        try {
            $cinemas = $this->service->getAll();
            return response()->json(['result' => 'success', 'cinemas' => $cinemas], 200);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $cinema = $this->service->store($request->all());
            return response()->json(['result' => 'success', 'cinema' => $cinema], 201);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->service->destroy($request->id);
            return response()->json(['result' => 'success'], 200);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function addMovie(Request $request)
    {
        try {
            $cinema = $this->service->addMovie($request->all());
            return response()->json(['result' => 'success', 'cinema' => $cinema], 200);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function removeMovie(Request $request)
    {
        try {
            $cinemas = $this->service->removeMovie($request->all());
            return response()->json(['result' => 'success', 'cinemas' => $cinemas], 200);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function withMovies()
    {
        try {
            $cinemas = $this->service->withMovies();
            return response()->json(['result' => 'success', 'cinemas' => $cinemas], 200);
        } catch (Throwable $th) {
            return $th;
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }
}
