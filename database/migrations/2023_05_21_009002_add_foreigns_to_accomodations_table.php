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
        Schema::table('accomodations', function (Blueprint $table) {
            $table
                ->foreign('toursite_id')
                ->references('id')
                ->on('toursites')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accomodations', function (Blueprint $table) {
            $table->dropForeign(['toursite_id']);
        });
    }
};
