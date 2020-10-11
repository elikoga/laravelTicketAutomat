@extends('layouts.app')

@section('title', 'Ticketautomaten')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>

    Ticket:
    <table>
        <tr>
            <th>Name</th>
            <th>Preis</th>
        </tr>
        <tr>
            <td>{{ $ticket->name }}</td>
            <td>{{ $ticket->preis }}</td>
        </tr>
    </table>

    <hr>

    Automaten:
    <table>
        <tr>
            <th>Aufstellort</th>
            <th>Bedienen</th>
            <th>Guthaben</th>
        </tr>
    @foreach ($ticket->ticketAutomaten as $ticketAutomat)
        <tr>
            <td>{{ $ticketAutomat->aufstellort }}</td>
            <td><a href="{{ route('ticketAutomat', ['automat' => $ticketAutomat->id]) }}">Link</a></td>
            <td>{{ $ticketAutomat->guthaben }}</td>
        </tr>
    @endforeach
    </table>

    <hr>

    Automat hinzufügen:

    <form method="POST" action="{{ route('ticket.addAutomat', ['ticket' => $ticket]) }}">
        @csrf
        <label for="ticketAutomat_id">Id des Ticketautomaten</label>
        <input id="ticketAutomat_id" name="ticketAutomat_id" type="text">
        <input type="submit" value="Submit">
    </form>
@endsection