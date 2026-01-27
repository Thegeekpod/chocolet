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
            // Hero Section
            $table->string('hero_subheading')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->json('hero_slides')->nullable();

            // About Section
            $table->string('about_label')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_description_1')->nullable();
            $table->text('about_description_2')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_years')->nullable();
            $table->string('about_countries')->nullable();

            // Stats
            $table->string('stat_1_val')->nullable();
            $table->string('stat_1_text')->nullable();
            $table->string('stat_2_val')->nullable();
            $table->string('stat_2_text')->nullable();
            $table->string('stat_3_val')->nullable();
            $table->string('stat_3_text')->nullable();

            // Featured Products Section
            $table->string('featured_products_title')->nullable();
            $table->json('featured_products_json')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_subheading',
                'hero_title',
                'hero_description',
                'hero_slides',
                'about_label',
                'about_title',
                'about_description_1',
                'about_description_2',
                'about_image',
                'about_years',
                'about_countries',
                'stat_1_val',
                'stat_1_text',
                'stat_2_val',
                'stat_2_text',
                'stat_3_val',
                'stat_3_text',
                'featured_products_title',
                'featured_products_json'
            ]);
        });
    }
};
