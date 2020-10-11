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
            <th>Aufstellort</th>
            <th>Bedienen</th>
            <th>Guthaben</th>
        </tr>
    @foreach ($ticketAutomaten as $ticketAutomat)
        <tr>
            <td>{{ $ticketAutomat->aufstellort }}</td>
            <td><a href="{{ route('ticketAutomat', ['automat' => $ticketAutomat->id]) }}">Link</a></td>
            <td>{{ $ticketAutomat->guthaben }}</td>
        </tr>
    @endforeach
    </table>

    <hr>
    
    Automat hinzufügen:

    <form method="POST" action="{{ route('ticketAutomaten.add') }}">
        @csrf
        <label for="aufstellort">Aufstellort</label>
        <input id="aufstellort" name="aufstellort" type="text">
        <input type="submit" value="Submit">
    </form>
@endsection