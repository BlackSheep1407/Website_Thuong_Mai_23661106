<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        $adminExists = DB::table('user')->where('user_username', 'admin')->exists();

        if (!$adminExists) {
            DB::table('user')->insert([
                'user_username' => 'admin',
                'user_password' => Hash::make('123'), // Admin password: 123
                'user_fullname' => 'Administrator',
                'user_email' => 'admin@2tfresh.com',
                'user_phone' => '0949642295',
                'user_address' => '33 Vĩnh Viễn, Phường Vườn Lài, TP.HCM',
                'user_role' => 1, // Admin role
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Update existing users with sample email and phone if they are null
        $users = DB::table('user')->get();

        foreach ($users as $index => $user) {
            if (empty($user->user_email) || empty($user->user_phone)) {
                $email = 'user' . ($user->user_id) . '@example.com';
                $phone = '090' . str_pad($user->user_id, 7, '0', STR_PAD_LEFT);

                DB::table('user')
                    ->where('user_id', $user->user_id)
                    ->update([
                        'user_email' => $email,
                        'user_phone' => $phone,
                    ]);
            }
        }
    }
}
