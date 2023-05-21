<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('toursite_id');
            $table->string('name');
            $table
                ->enum('type', [
                    'hotel',
                    'restaurant',
                    'motel',
                    'lodge',
                    'resort',
                    'other',
                ])
                ->default('hotel');
            $table
                ->enum('sleep_service', ['yes', 'no'])
                ->default('yes')
                ->nullable();
            $table->text('description')->nullable();
            $table->float('local_night_fee')->nullable();
            $table->float('international_night_fee')->nullable();
            $table
                ->enum('food_service', ['yes', 'no'])
                ->default('yes')
                ->nullable();
            $table->text('food_types_and_price')->nullable();
            $table
                ->enum('is_inside_park', ['yes', 'no'])
                ->default('yes')
                ->nullable();
            $table->decimal('distance_to_tour_site')->nullable();
            $table->integer('room_available')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accomodations');
    }
};
