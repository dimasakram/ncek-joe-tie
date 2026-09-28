<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('restaurant_profiles', function (Blueprint $table) {
            $table->string('tiktok')->nullable()->after('facebook');
        });
    }

    public function down(): void
    {
        Schema::table('restaurant_profiles', function (Blueprint $table) {
            $table->dropColumn('tiktok');
        });
    }
};