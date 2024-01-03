<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 'user',
            'LRN' => 119255120445,
            'name' => 'khent',
            'email' => 'khent@gmail.com',
            'password' => Hash::make('khent123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'role' => 'admin',
            'LRN' => 119255120449,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
