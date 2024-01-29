<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            'creater_id' => 1,
            'name' => 'bandbandbandbandband',
            'level' => 5,
            'introduction' => 'hello! I am band1-1.hello! I am band1-1.hello! I am band1-1.hello! I am band1-1.hello! I am band1-1.',
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('bands')->insert([
            'creater_id' => 1,
            'name' => 'band1-2',
            'level' => 10,
            'introduction' => 'hello! I am band1-2.',
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('bands')->insert([
            'creater_id' => 2,
            'name' => 'band2-1',
            'level' => 6,
            'introduction' => 'hello! I am band2-1.',
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('bands')->insert([
            'creater_id' => 2,
            'name' => 'band2-2',
            'level' => 7,
            'introduction' => 'hello! I am band2-2.',
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('bands')->insert([
            'creater_id' => 3,
            'name' => 'band3-1',
            'level' => 4,
            'introduction' => 'hello! I am band3-1.',
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
    }
}
