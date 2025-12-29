<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_cart_items_table.php
    public function up()
{
    Schema::create('cart_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('cart_id');
        $table->unsignedBigInteger('product_id');
        $table->integer('qty')->default(1);
        $table->timestamps();

        $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        $table->foreign('product_id')->references('product_id')->on('product')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
