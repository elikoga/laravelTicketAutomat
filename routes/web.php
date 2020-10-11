<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketAutomatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('ticketAutomaten');
});

Route::get('/ticketAutomaten', [TicketAutomatController::class, 'showAll'])
    ->name('ticketAutomaten');

Route::post('/ticketAutomaten/add', [TicketAutomatController::class, 'addAutomat'])
    ->name('ticketAutomaten.add');

Route::get('/ticketAutomat/{automat}', [TicketAutomatController::class, 'show'])
    ->name('ticketAutomat');

Route::get('/ticketAutomat/{automat}/{menge}', [TicketAutomatController::class, 'einzahlen'])
    ->name('ticketAutomat.einzahlen');

Route::get('/ticketAutomat/{automat}/kaufTicket/{ticket}', [TicketAutomatController::class, 'kauf'])
    ->name('ticketAutomat.kauf');



Route::get('/tickets', [TicketController::class, 'showAll'])
    ->name('tickets');

Route::post('/tickets/add', [TicketController::class, 'addTicket'])
    ->name('tickets.add');

Route::get('/ticket/{ticket}', [TicketController::class, 'show'])
    ->name('ticket');

Route::post('/ticket/{ticket}/addAutomat', [TicketController::class, 'addAutomatToTicket'])
    ->name('ticket.addAutomat');