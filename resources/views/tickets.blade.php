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
    
    <table>
        <tr>
            <th>Name</th>
            <th>Preis</th>
            <th>Manage</th>
        </tr>
    @foreach ($tickets as $ticket)
        <tr>
            <td>{{ $ticket->name }}</td>
            <td>{{ $ticket->preis }}</td>
            <td><a href="{{ route('ticket', ['ticket' => $ticket]) }}">Link</a></td>
        </tr>
    @endforeach
    </table>

    <hr>
    
    Ticket hinzufügen:

    <form method="POST" action="{{ route('tickets.add') }}">
        @csrf
        <label for="name">Name</label>
        <input id="name" name="name" type="text">
        <label for="preis">Preis</label>
        <input id="preis" name="preis" type="text">
        <input type="submit" value="Submit">
    </form>
@endsection