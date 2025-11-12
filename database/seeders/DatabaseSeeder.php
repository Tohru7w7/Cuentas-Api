<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(users_seed::class);
        $this->call(accounts_seed::class);
        $this->call(categories_seed::class);
        $this->call(transactions_seed::class);
    }
}
