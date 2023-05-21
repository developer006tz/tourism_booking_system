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
        Schema::table('accomodationimages', function (Blueprint $table) {
            $table
                ->foreign('accomodations_id')
                ->references('id')
                ->on('accomodations')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accomodationimages', function (Blueprint $table) {
            $table->dropForeign(['accomodations_id']);
        });
    }
};
