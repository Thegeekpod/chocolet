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
            $table->string('global_meta_title')->nullable();
            $table->text('global_meta_description')->nullable();
            $table->longText('head_scripts')->nullable();
            $table->longText('body_scripts')->nullable();
            $table->longText('footer_scripts')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'global_meta_title',
                'global_meta_description',
                'head_scripts',
                'body_scripts',
                'footer_scripts'
            ]);
        });
    }
};
