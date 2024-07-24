<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGalleryToEntities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            $table->json('gallery')->nullable()->after('price_per_night');
        });

        Schema::table('cuisines', function (Blueprint $table) {
            $table->json('gallery')->nullable()->after('image');
        });

        Schema::table('destinations', function (Blueprint $table) {
            $table->json('gallery')->nullable()->after('ticket_price');
        });

        Schema::table('tours', function (Blueprint $table) {
            $table->json('gallery')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            $table->dropColumn('gallery');
        });

        Schema::table('cuisines', function (Blueprint $table) {
            $table->dropColumn('gallery');
        });

        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('gallery');
        });

        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('gallery');
        });
    }
}