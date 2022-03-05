<?php

namespace App\Services\Ticket;

use App\Models\CinemaMovie;
use App\Models\Ticket;
use App\Services\Seat\SeatServiceInterface;
use Illuminate\Http\Exceptions\HttpResponseException;

class TicketService implements TicketServiceInterface
{

    protected $seatService;

    public function __construct(
        SeatServiceInterface $seatService
    ) {
        $this->seatService = $seatService;
    }

    public function getTicketsByUserId(int $user_id)
    {
        return Ticket::where('user_id', $user_id)->with(
            [
                'cinema_movie' => function ($q) {
                    $q->with('movie');
                },
                'seats'
            ]
        )->get();
    }

    public function store(array $attributes)
    {
        if (!$this->seatService->areSeatsAvailable($attributes))
            throw new HttpResponseException(response()->json([
                'errors' => "Seats you selected are occupied."
            ], 422));
        $ticket = Ticket::create($attributes);
        $this->seatService->occupySeatsForTicket(array_merge($attributes, ['ticket_id' => $ticket->id]));
        return Ticket::where('id', $ticket->id)->with(['cinema_movie', 'seats'])->first();
    }
}
