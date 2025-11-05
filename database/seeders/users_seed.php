<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class users_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com', 
            'password' =>Hash::make('12345'),
            'created_at' =>date('Y-m-d H:i:s')
        ]);
    }
}
