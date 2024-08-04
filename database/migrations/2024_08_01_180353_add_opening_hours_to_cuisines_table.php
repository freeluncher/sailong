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
        Schema::table('cuisines', function (Blueprint $table) {
            $table->time('opening_hours')->nullable(); // Atau tipe data lain yang sesuai
            $table->time('closing_hours')->nullable(); // Atau tipe data lain yang sesuai
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cuisines', function (Blueprint $table) {
            $table->dropColumn('opening_hours');
            $table->dropColumn('closing_hours');
        });
    }
};