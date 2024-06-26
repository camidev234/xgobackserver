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
        Schema::create('aircraft_seats', function (Blueprint $table) {
            $table->id();
            $table->string('seat_code', 5);
            $table->foreignId('rate_id')->references('id')->on('rates');
            $table->foreignId('aircraft_id')->references('id')->on('aircraft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aircraft_seats');
    }
};
