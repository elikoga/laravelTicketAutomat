<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketAutomatenTableAddAufstellort extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_automaten', function (Blueprint $table) {
            $table->string('aufstellort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_automaten', function (Blueprint $table) {
            $table->dropColumn('aufstellort');
        });
    }
}
