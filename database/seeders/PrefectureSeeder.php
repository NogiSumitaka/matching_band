<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            'prefecture' => '東京',
            ]);
        DB::table('prefectures')->insert([
            'prefecture' => '大阪',
            ]);
        DB::table('prefectures')->insert([
            'prefecture' => '名古屋',
            ]);
        DB::table('prefectures')->insert([
            'prefecture' => '北九州',
            ]);
        DB::table('prefectures')->insert([
            'prefecture' => '仙台',
            ]);
    }
}
