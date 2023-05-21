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
        Schema::create('transportations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('toursite_id');
            $table
                ->enum('type', [
                    'flight',
                    'bus',
                    'train',
                    'motorcycle',
                    'boat',
                    'ship',
                ])
                ->default('flight');
            $table->decimal('price');
            $table->decimal('distance_covered_in_km');
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation');
    }
};
