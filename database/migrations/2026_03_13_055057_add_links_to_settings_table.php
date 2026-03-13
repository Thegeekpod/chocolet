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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('stat_1_link')->default('#')->after('stat_1_text');
            $table->string('stat_2_link')->default('#')->after('stat_2_text');
            $table->string('stat_3_link')->default('#')->after('stat_3_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['stat_1_link', 'stat_2_link', 'stat_3_link']);
        });
    }
};
