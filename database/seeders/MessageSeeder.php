<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'user_id' => 1,
            'band_id' => 3,
            'user_to_band' => true,
            'message' => 'guest1です！',
            'created_at' => now()->subDays(1)->subHours(2),
            'updated_at' => now()->subDays(1)->subHours(2),
            ]);
        DB::table('messages')->insert([
            'user_id' => 1,
            'band_id' => 3,
            'user_to_band' => false,
            'message' => 'band2-1です！よろしくguest1！',
            'created_at' => now()->subDays(1)->subHours(1),
            'updated_at' => now()->subDays(1)->subHours(1),
            ]);
        DB::table('messages')->insert([
            'user_id' => 2,
            'band_id' => 1,
            'user_to_band' => true,
            'message' => 'guest2です！',
            'created_at' => now()->subDays(1)->subHours(2),
            'updated_at' => now()->subDays(1)->subHours(2),
            ]);
        DB::table('messages')->insert([
            'user_id' => 2,
            'band_id' => 1,
            'user_to_band' => false,
            'message' => 'band1-1です！よろしくguest2！',
            'created_at' => now()->subDays(1)->subHours(1),
            'updated_at' => now()->subDays(1)->subHours(1),
            ]);
        DB::table('messages')->insert([
            'user_id' => 3,
            'band_id' => 1,
            'user_to_band' => true,
            'message' => 'guest3です！',
            'created_at' => now()->subDays(1)->subHours(2),
            'updated_at' => now()->subDays(1)->subHours(2),
            ]);
        DB::table('messages')->insert([
            'user_id' => 3,
            'band_id' => 1,
            'user_to_band' => false,
            'message' => 'band1-1です！よろしくguest3！',
            'created_at' => now()->subDays(1)->subHours(1),
            'updated_at' => now()->subDays(1)->subHours(1),
            ]);
    }
}
