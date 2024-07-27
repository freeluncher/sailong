<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->time('opening_hours')->nullable(); // Atau tipe data lain yang sesuai
            $table->time('closing_hours')->nullable(); // Atau tipe data lain yang sesuai
        });
    }

    public function down()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('opening_hours');
            $table->dropColumn('closing_hours');
        });
    }
};