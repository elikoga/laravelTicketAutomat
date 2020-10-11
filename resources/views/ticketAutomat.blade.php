@extends('layouts.app')

@section('title', 'Ticketautomat Administration')

@section('content')
    <table>
        <tr>
            <th>Aufstellort</th>
            <th>Guthaben</th>
        </tr>
        <tr>
            <td>{{ $ticketAutomat->aufstellort }}</td>
            <td>{{ $ticketAutomat->guthaben }}</td>
        </tr>
    </table>

    <hr>

    <a href="{{ route('ticketAutomat.einzahlen', ['automat' => $ticketAutomat, 'menge' => 0.01]) }}">0.01€</a>
    <a href="{{ route('ticketAutomat.einzahlen', ['automat' => $ticketAutomat, 'menge' => 0.02]) }}">0.02€</a>
    <a href="{{ route('ticketAutomat.einzahlen', ['automat' => $ticketAutomat, 'menge' => 0.05]) }}">0.05€</a>
    <a href="{{ route('ticketAutomat.einzahlen', ['automat' => $ticketAutomat, 'menge' => 0.10]) }}">0.10€</a>
    <a href="{{ route('ticketAutomat.einzahlen', ['automat' => $ticketAutomat, 'menge' => 0.20]) }}">0.20€</a>
    <a href="{{ route('ticketAutomat.einzahlen', ['automat' => $ticketAutomat, 'menge' => 0.50]) }}">0.50€</a>
    <a href="{{ route('ticketAutomat.einzahlen', ['automat' => $ticketAutomat, 'menge' => 1.00]) }}">1.00€</a>
    <a href="{{ route('ticketAutomat.einzahlen', ['automat' => $ticketAutomat, 'menge' => 2.00]) }}">2.00€</a>

    <hr>

    Tickets:

    <table>
        <tr>
            <th>Name</th>
            <th>Preis</th>
            <th>Kaufen</th>
        </tr>
    @foreach ($ticketAutomat->tickets as $ticket)
        <tr>
            <td>{{ $ticket->name }}</td>
            <td>{{ $ticket->preis }}</td>
            <td><a href="{{ route('ticketAutomat.kauf', ['automat' => $ticketAutomat, 'ticket' => $ticket]) }}">Kaufen</a></td>
        </tr>
    @endforeach
    </table>

@endsection