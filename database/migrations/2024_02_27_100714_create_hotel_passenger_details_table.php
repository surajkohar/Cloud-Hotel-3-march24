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
        Schema::create('hotel_passenger_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_hotel_id')->constrained('booking_hotels')->cascadeOnDelete();
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('type');
            $table->unsignedInteger('age')->nullable();
            $table->unsignedInteger('room')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_passenger_details');
    }
};
