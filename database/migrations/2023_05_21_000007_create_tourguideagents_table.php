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
        Schema::create('tourguideagents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('toursite_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->float('guide_price_per_day')->nullable();
            $table->decimal('rating')->nullable();
            $table->float('distance_covered')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourguideagents');
    }
};
