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
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('booking_hotels_id')->constrained('booking_hotels')->cascadeOnDelete();
            $table->string('hotel_id');
            $table->string('vendor');
            $table->string('hotel_name');
            $table->string('hotel_rating');
            $table->string('hotel_address');
            $table->string('hotel_phone')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->text('important_notes')->nullable();
            $table->string('passenger_phone');
            $table->string('passenger_address1');
            $table->string('passenger_address2')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code');
            $table->string('passenger_email');
            $table->string('room_type');
            $table->string('board_type')->nullable();
            $table->string('cancellation_deadline')->nullable();
            $table->string('cancellation_policy')->nullable();
            $table->string('emergency_contact_no')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
