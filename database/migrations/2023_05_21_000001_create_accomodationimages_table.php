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
        Schema::create('accomodationimages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accomodations_id');
            $table
                ->enum('type', ['food', 'room', 'bed', 'surroundings', 'other'])
                ->default('surroundings')
                ->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accomodationimages');
    }
};
