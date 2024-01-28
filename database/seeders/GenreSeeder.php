<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'genre' => 'pop',
            ]);
        DB::table('genres')->insert([
            'genre' => 'rock',
            ]);
        DB::table('genres')->insert([
            'genre' => 'jazz',
            ]);
        DB::table('genres')->insert([
            'genre' => 'R&B',
            ]);
        DB::table('genres')->insert([
            'genre' => 'altanative',
            ]);
    }
}
