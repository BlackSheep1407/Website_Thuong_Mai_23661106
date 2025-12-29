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
        Schema::create('fruits', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // Tên trái cây (Bưởi da xanh)
            $table->string('slug')->unique(); // Đường dẫn thân thiện (buoi-da-xanh)
            $table->text('description')->nullable(); // Mô tả trái cây
            $table->decimal('price', 8, 2); // Giá trái cây
            $table->string('image')->nullable(); // Hình ảnh trái cây
            $table->integer('stock')->default(0); // Số lượng trong kho
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fruits');
    }
};
