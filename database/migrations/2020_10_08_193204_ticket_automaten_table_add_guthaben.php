<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketAutomatenTableAddGuthaben extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_automaten', function (Blueprint $table) {
            $table->decimal('guthaben', 8, 2);
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
            $table->dropColumn('guthaben');
        });
    }
}
