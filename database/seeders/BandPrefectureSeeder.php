<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;

class BandPrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('band_prefecture')->insert([
            'band_id' => 1,
            'prefecture_id' => 1,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('band_prefecture')->insert([
            'band_id' => 2,
            'prefecture_id' => 2,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('band_prefecture')->insert([
            'band_id' => 3,
            'prefecture_id' => 3,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('band_prefecture')->insert([
            'band_id' => 4,
            'prefecture_id' => 4,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('band_prefecture')->insert([
            'band_id' => 5,
            'prefecture_id' => 5,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
    }
}
