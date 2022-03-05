<?php

namespace App\Services\Ticket;

interface TicketServiceInterface
{
    public function getTicketsByUserId(int $user_id);
    public function store(array $attributes);
}
