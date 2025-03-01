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
        Schema::table('station_sensors', function (Blueprint $table) {
            $table->foreignId('station_id')->nullable()->default(null)->change();
            $table->foreignId('sensor_id')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('station_sensors', function (Blueprint $table) {
            $table->foreignId('station_id')->nullable(false)->change();
            $table->foreignId('sensor_id')->nullable(false)->change();
        });
    }
};
