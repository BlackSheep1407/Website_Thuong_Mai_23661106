<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Sử dụng raw SQL để đổi kích thước cột (không cần doctrine/dbal)
        DB::statement("ALTER TABLE `user` MODIFY `user_password` VARCHAR(255) NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Nếu muốn rollback, giảm về VARCHAR(60) (bcrypt thường 60)
        DB::statement("ALTER TABLE `user` MODIFY `user_password` VARCHAR(60) NOT NULL");
    }
};
