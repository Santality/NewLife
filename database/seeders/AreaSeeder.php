<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('areas')->insert([
            ['title_area' => 'Орджоникидзевский'],
            ['title_area' => 'Калининский'],
            ['title_area' => 'Октябрьский'],
            ['title_area' => 'Советский'],
            ['title_area' => 'Ленинский'],
            ['title_area' => 'Дёмский'],
            ['title_area' => 'Кировский'],
        ]);
    }
}
