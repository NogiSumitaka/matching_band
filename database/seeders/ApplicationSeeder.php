<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            'user_id' => 1,
            'band_id' => 3,
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
            ]);
        DB::table('applications')->insert([
            'user_id' => 1,
            'band_id' => 5,
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
            ]);
        DB::table('applications')->insert([
            'user_id' => 2,
            'band_id' => 1,
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
            ]);
        DB::table('applications')->insert([
            'user_id' => 2,
            'band_id' => 2,
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
            ]);
        DB::table('applications')->insert([
            'user_id' => 3,
            'band_id' => 1,
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
            ]);
        DB::table('applications')->insert([
            'user_id' => 3,
            'band_id' => 4,
            'created_at' => now()->subDays(2),
            'updated_at' => now()->subDays(2),
            ]);
    }
}
