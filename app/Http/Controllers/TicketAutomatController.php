<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketAutomat;
use App\Models\Ticket;

class TicketAutomatController extends Controller
{
    public function showAll()
    {
        $ticketAutomaten = TicketAutomat::get();
        return view('ticketAutomaten', ['ticketAutomaten' => $ticketAutomaten]);
    }

    public function addAutomat(Request $request)
    {
        $validatedData = $request->validate([
            'aufstellort' => 'required'
        ]);
        $ticketAutomat = new TicketAutomat;
        $ticketAutomat->aufstellort = $validatedData['aufstellort'];
        $ticketAutomat->save();
        return redirect()->route('ticketAutomaten');
    }

    public function show(TicketAutomat $automat)
    {
        return view('ticketAutomat', ['ticketAutomat' => $automat]);
    }

    public function einzahlen(TicketAutomat $automat, $menge) 
    {
        $automat->guthaben += $menge;
        $automat->save();
        return redirect()->route('ticketAutomat', ['automat' => $automat]);
    }

    public function kauf(TicketAutomat $automat, Ticket $ticket)
    {
        $guthaben = $automat->guthaben;
        $preis = $ticket->preis;
        if($guthaben > $preis){
            $automat->guthaben -= $preis;
            $automat->save();
        }
        return redirect()->route('ticketAutomat', ['automat' => $automat]);
    }
}
