<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function ticketAutomaten()
    {
        return $this->belongsToMany('App\Models\TicketAutomat', 'ticket_automaten_ticket');
    }
}
