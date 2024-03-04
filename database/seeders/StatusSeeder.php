<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['title_status' => 'На модерации'],
            ['title_status' => 'Активно'],
            ['title_status' => 'Найдено'],
            ['title_status' => 'В архиве'],
        ]);
    }
}
