<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kinds')->insert([
            ['title_kind' => 'Собака'],
            ['title_kind' => 'Кошка'],
            ['title_kind' => 'Хомяк'],
            ['title_kind' => 'Хорек'],
            ['title_kind' => 'Кролик'],
            ['title_kind' => 'Попугай'],
            ['title_kind' => 'Черепаха'],
            ['title_kind' => 'Морская свинка'],
            ['title_kind' => 'Канарейка'],
            ['title_kind' => 'Змея'],
        ]);
    }
}
