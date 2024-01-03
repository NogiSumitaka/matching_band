<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            'name' => 'the band apart',
            'level' => '10',
            'introduction' => '一番好きなバンドデス！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('bands')->insert([
            'name' => 'toconoma',
            'level' => '8',
            'introduction' => 'あんな感じのいけおじになりたい',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('bands')->insert([
            'name' => 'nothings carved in stone',
            'level' => '9',
            'introduction' => 'ひなっちと大喜多兄貴のドラムが最高にかっこいい！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
        DB::table('bands')->insert([
            'name' => 'matching band',
            'level' => '7',
            'introduction' => 'マッチングバンドです！3ピースで活動しています．',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            ]);
    }
}
