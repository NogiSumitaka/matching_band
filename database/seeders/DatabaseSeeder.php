<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            InstSeeder::class,
            GenreSeeder::class,
            PrefectureSeeder::class,
            UserSeeder::class,
            BandSeeder::class,
            BandInstSeeder::class,
            BandGenreSeeder::class,
            BandPrefectureSeeder::class,
            ApplicationSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
