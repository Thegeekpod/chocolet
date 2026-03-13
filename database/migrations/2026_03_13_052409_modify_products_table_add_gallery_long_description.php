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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['weight', 'ingredients', 'shelf_life', 'storage']);
            $table->longText('long_description')->after('description')->nullable();
            $table->json('gallery')->after('image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('weight')->nullable();
            $table->string('ingredients')->nullable();
            $table->string('shelf_life')->nullable();
            $table->string('storage')->nullable();
            $table->dropColumn(['long_description', 'gallery']);
        });
    }
};
