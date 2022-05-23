<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\StoreRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Services\Ticket\TicketServiceInterface;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    protected $service;
    public function __construct(
        TicketServiceInterface $service
    ) {
        $this->service = $service;
    }

    public function index()
    {

    }

    public function myTickets()
    {
        try {
            $tickets = $this->service->getTicketsByUserId(Auth::id());
            return response()->json(['result' => 'success', 'tickets' => $tickets], 200);
        } catch (Throwable $th) {
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

    public function store(StoreRequest $request)
    {
        try {
            $ticket = $this->service->store(array_merge($request->all(), ['user_id' => Auth::id()]));
            return response()->json(['result' => 'success', 'ticket' => $ticket], 201);
        } catch (Throwable $th) {
            return response()->json(['result' => 'failure', 'error' => $th->getMessage()], 500);
        }
    }

}
