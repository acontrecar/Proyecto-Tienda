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
        Schema::create('products_stock', function (Blueprint $table) {
            $table->id('stock_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('size_id');
            $table->integer('quantity');

            $table->foreign('product_id')->references('product_id')->on('products');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_stock');
    }
};
