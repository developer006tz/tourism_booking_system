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
        Schema::table('attractionimages', function (Blueprint $table) {
            $table
                ->foreign('attractions_id')
                ->references('id')
                ->on('attractions')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attractionimages', function (Blueprint $table) {
            $table->dropForeign(['attractions_id']);
        });
    }
};
