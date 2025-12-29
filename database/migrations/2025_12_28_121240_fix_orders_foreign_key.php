<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop existing foreign key constraint
        try {
            DB::statement('ALTER TABLE orders DROP FOREIGN KEY orders_ibfk_1');
        } catch (\Exception $e) {
            // Constraint might not exist, continue
        }

        // Since user_id types don't match (bigint vs int), we'll remove foreign key entirely
        // Orders can exist without valid user references (guest orders)
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restore foreign key to users table (Laravel default)
        try {
            DB::statement('ALTER TABLE orders ADD CONSTRAINT orders_ibfk_1 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL');
        } catch (\Exception $e) {
            // Ignore if constraint already exists
        }
    }
};
