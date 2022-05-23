<?php

namespace App\Http\Controllers\Cinema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cinema\AddMovieRequest;
use App\Http\Requests\Cinema\DestroyRequest;
use App\Http\Requests\Cinema\FilterRequest;
use App\Http\Requests\Cinema\RemoveMovieRequest;
use App\Http\Requests\Cinema\StoreRequest;
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
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            $cinema = $this->service->store($request->validated());
            return response()->json(['result' => 'success', 'cinema' => $cinema], 201);
        } catch (Throwable $th) {
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function destroy(DestroyRequest $request)
    {
        try {
            $this->service->destroy($request->id);
            return response()->json(['result' => 'success'], 200);
        } catch (Throwable $th) {
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function addMovie(AddMovieRequest $request)
    {
        try {
            $cinema = $this->service->addMovie($request->validated());
            return response()->json(['result' => 'success', 'cinema' => $cinema], 200);
        } catch (Throwable $th) {
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function removeMovie(RemoveMovieRequest $request)
    {
        try {
            $cinemas = $this->service->removeMovie($request->validated());
            return response()->json(['result' => 'success', 'cinemas' => $cinemas], 200);
        } catch (Throwable $th) {
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function filter(FilterRequest $request)
    {
        try {
            $cinemas = $this->service->filter($request->validated());
            return response()->json(['result' => 'success', 'cinemas' => $cinemas], 200);
        } catch (Throwable $th) {
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }
}
