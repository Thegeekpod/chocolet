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
            // Brands Section
            $table->json('brands_data')->nullable(); // Categories, descriptions, images, logos

            // Why Choose Us
            $table->string('why_title')->nullable();
            $table->json('why_features')->nullable(); // Icon, title, desc
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['brands_data', 'why_title', 'why_features']);
        });
    }
};
