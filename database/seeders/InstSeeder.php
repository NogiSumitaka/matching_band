<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class InstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insts')->insert([
            'inst' => 'guitar',
            ]);
        DB::table('insts')->insert([
            'inst' => 'bass',
            ]);
        DB::table('insts')->insert([
            'inst' => 'vocal',
            ]);
        DB::table('insts')->insert([
            'inst' => 'drum',
            ]);
        DB::table('insts')->insert([
            'inst' => 'keyboard',
            ]);
    }
}
