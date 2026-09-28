<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('restaurant_profiles', function (Blueprint $table) {
            $table->dropColumn(['history', 'vision', 'mission', 'core_values', 'cover_photo']);
        });
    }

    public function down(): void
    {
        Schema::table('restaurant_profiles', function (Blueprint $table) {
            $table->text('history')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('core_values')->nullable();
            $table->string('cover_photo')->nullable();
        });
    }
};