<?php

namespace App\Services\Seat;

use App\Models\Ticket;

class SeatService implements SeatServiceInterface
{

    public function areSeatsAvailable(array $attributes)
    {
        return Ticket::where('cinema_movie_id', $attributes['cinema_movie_id'])->whereHas(
            'seats',
            function ($q) use ($attributes) {
                $q->whereIn('seat_number', $attributes['seat_numbers']);
            }
        )->count() === 0;
    }

    public function occupySeatsForTicket(array $attributes)
    {
        $seatsToCreate = collect($attributes['seat_numbers'])->map(function ($seat_number) {
            return [
                'seat_number' => $seat_number,
            ];
        })->toArray();

        return Ticket::find($attributes['ticket_id'])->seats()->createMany(
            $seatsToCreate
        );
    }
}
