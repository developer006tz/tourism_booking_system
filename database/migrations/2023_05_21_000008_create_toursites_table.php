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
        Schema::create('toursites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('country_id');
            $table->string('other_name')->nullable();
            $table->text('description')->nullable();
            $table->text('accomodation')->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            $table->decimal('distance')->nullable();
            $table->text('attractions')->nullable();
            $table->float('local_price')->nullable();
            $table->float('international_price')->nullable();
            $table->text('time_of_visit')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toursites');
    }
};
