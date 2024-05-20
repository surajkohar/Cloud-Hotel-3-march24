<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_flights', function (Blueprint $table) {
            $table->id();

            $table->string('booking_id');
            $table->string('lead_passenger_name');
            $table->string('agent_name');
            $table->float('price');
            $table->date('booking_date');
            $table->string('departure_date');
            $table->string('arrival_date');
            $table->string('departure_time');
            $table->string('arrival_time');
            $table->string('flight_number');
            $table->string('airline');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_flights');
    }
};
