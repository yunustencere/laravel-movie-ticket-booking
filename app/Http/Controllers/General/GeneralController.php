<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\General;
use Illuminate\Http\Request;
use App\Services\General\GeneralServiceInterface;

class GeneralController extends Controller
{
    protected $service;
    public function __construct(
        GeneralServiceInterface $service
    ) {
        $this->service = $service;
    }

    public function cities()
    {
        try {
            $cities = $this->service->cities();
            return response()->json(['result' => 'success', 'cities' => $cities], 201);
        } catch (Throwable $th) {
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }
}
