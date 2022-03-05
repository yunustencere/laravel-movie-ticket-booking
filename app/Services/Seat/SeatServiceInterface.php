<?php

namespace App\Services\Seat;

interface SeatServiceInterface
{
    public function areSeatsAvailable(array $attributes);
    public function occupySeatsForTicket(array $attributes);
}
