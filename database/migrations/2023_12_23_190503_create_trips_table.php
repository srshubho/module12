<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('departure_location_id');
            $table->unsignedBigInteger('arrival_location_id');
            $table->dateTime('departure_time');
            $table->timestamps();

            $table->foreign('departure_location_id')->references('id')->on('locations');
            $table->foreign('arrival_location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
