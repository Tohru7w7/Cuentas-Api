<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class transactions_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            'ammount'=>'500',
            'type'=>'income',
            'description'=>'Transaccion Inicial',
            'user_id'=>1,
            'account_id'=>1,
            'category_id'=>1,
            'created_at'=>date('Y-m-d h:m:s')
        ]);
    }
}
