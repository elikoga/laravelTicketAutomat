<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketAutomat;

class TicketController extends Controller
{
    public function showAll()
    {
        $tickets = Ticket::get();
        return view('tickets', ['tickets' => $tickets]);
    }

    public function addTicket(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'preis' => 'required|numeric'
        ]);
        $ticket = new Ticket;
        $ticket->name = $validatedData['name'];
        $ticket->preis = $validatedData['preis'];
        $ticket->save();
        return redirect()->route('tickets');
    }

    public function show(Ticket $ticket)
    {
        return view('ticket', ['ticket' => $ticket]);
    }

    public function addAutomatToTicket(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'ticketAutomat_id' => 'required|int',
        ]);
        $ticketAutomat = TicketAutomat::find($validatedData['ticketAutomat_id']);
        if ($ticketAutomat != null) {
            $ticket->ticketAutomaten()->save($ticketAutomat);
        }
        return redirect()->route('ticket', ['ticket' => $ticket]);
    }
}
