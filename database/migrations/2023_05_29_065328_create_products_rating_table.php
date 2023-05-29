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
        Schema::create('products_rating', function (Blueprint $table) {
            $table->id('rating_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->integer('rating');
            $table->string('review')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_rating');
    }
};
