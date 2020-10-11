<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAutomat extends Model
{
    protected $table = 'ticket_automaten';

    public function tickets(){
        return $this->belongsToMany('App\Models\Ticket', 'ticket_automaten_ticket');
    }
}
