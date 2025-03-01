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
        Schema::table('users', function (Blueprint $table) {
            $table->string('tel')->unique()->after('id');
            $table->tinyInteger('gender')->nullable()->default(null)->after('tel')->comment('0: is male, 1: is female');
            $table->string('address', 200)->nullable()->default(null)->after('gender');
            $table->tinyInteger('user_type')->comment('1: ROOT_ADMIN, 2: ADMIN_MEMBER')->after('password');
            $table->unsignedBigInteger('ward_id')->nullable()->default(null)->after('user_type');
            $table->unsignedBigInteger('district_id')->nullable()->default(null)->after('ward_id');
            $table->unsignedBigInteger('city_id')->nullable()->default(null)->after('district_id');
            $table->renameColumn('name', 'full_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tel');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('user_type');
            $table->dropColumn('ward_id');
            $table->dropColumn('district_id');
            $table->dropColumn('city_id');
            $table->renameColumn('full_name', 'name');
        });
    }
};
