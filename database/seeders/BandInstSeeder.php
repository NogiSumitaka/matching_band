<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;

class BandInstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('band_inst')->insert([
            'band_id' => 1,
            'inst_id' => 1,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('band_inst')->insert([
            'band_id' => 2,
            'inst_id' => 2,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('band_inst')->insert([
            'band_id' => 3,
            'inst_id' => 3,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('band_inst')->insert([
            'band_id' => 4,
            'inst_id' => 4,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
        DB::table('band_inst')->insert([
            'band_id' => 5,
            'inst_id' => 5,
            'created_at' => now()->subDays(7),
            'updated_at' => now()->subDays(7),
            ]);
    }
}
