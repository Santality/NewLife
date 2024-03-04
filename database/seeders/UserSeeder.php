<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $currentDate = Carbon::now();
        DB::table('users')->insert([
            'name'=>'moder',
            'lastname'=>'moder',
            'phone'=>'89173522600',
            'email'=>'mail@newlife.ru',
            'password'=>Hash::make('moder'),
            'role'=>1,
            'created_at' => $currentDate,
            'updated_at' => $currentDate,
        ]);
    }
}
