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
        Schema::create('stuba_hotels', function (Blueprint $table) {
            $table->Id();
//            $table->string('Id'); // Note: 'Id' instead of 'id' based on your data
            $table->string('Name')->default('No Hotel Name'); // Note: 'Name' instead of 'name'
            $table->json('Region');
            $table->string('Type');
            $table->json('Address');
            $table->string('Stars');
            $table->json('GeneralInfo');
            $table->json('Photo');
            $table->json('Description');
            $table->json('Amenity');
            $table->json('Rating');
            $table->string('Rank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stuba_hotels');
    }
};
