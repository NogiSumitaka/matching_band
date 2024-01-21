<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

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
            'name' => 'guest1',
            'email' => 'guest1@gmail.com',
            'password' => Hash::make('guest1111'),
            'introduction' => 'hello! I am guest1.',
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('users')->insert([
            'name' => 'guest2',
            'email' => 'guest2@gmail.com',
            'password' => Hash::make('guest2111'),
            'introduction' => 'hello! I am guest2.',
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('users')->insert([
            'name' => 'guest3',
            'email' => 'guest3@gmail.com',
            'password' => Hash::make('guest3111'),
            'introduction' => 'hello! I am guest3.',
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
    }
}
