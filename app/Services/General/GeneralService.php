<?php

namespace App\Services\General;

use App\Models\City;

class GeneralService implements GeneralServiceInterface
{
    public function cities()
    {
        return City::all();
    }
}
