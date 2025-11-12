<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categories_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name'=>'Categoria Principal',
            'type'=>'income',
            'user_id'=>1,
            'created_at'=>date('Y-m-d h:m:s')
        ]);
    }
}
