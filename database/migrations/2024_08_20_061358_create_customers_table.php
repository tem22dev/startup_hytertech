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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('tel')->unique();
            $table->string('email')->unique();
            $table->tinyInteger('gender')->nullable()->default(null)->comment('1: is male, 2: is female');
            $table->string('avatar')->nullable()->default(null);
            $table->tinyInteger('status')->default(1);
            $table->string('password');
            $table->string('address', 200)->nullable()->default(null);
            $table->unsignedBigInteger('ward_id')->nullable()->default(null);
            $table->unsignedBigInteger('district_id')->nullable()->default(null);
            $table->unsignedBigInteger('city_id')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
