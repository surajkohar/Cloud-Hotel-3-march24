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
        Schema::create('booking_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->foreignId('booking_details_id')->constrained('booking_details')->cascadeOnDelete();
//            $table->foreignId('hotel_passenger_details_id')->constrained('hotel_passenger_details')->cascadeOnDelete();
            $table->string('leadPassenger_name');
            $table->string('agents_name');
//            $table->decimal('price', 10, 2);
            $table->float('price');
            $table->date('booking_date');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_hotels');
    }
};
