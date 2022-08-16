<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\userSeeder;
use Database\Seeders\lessonSeeder;
use Database\Seeders\tagSeeder;
use Database\Seeders\lesson_tagSeeder;

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
            userSeeder::class,
            lessonSeeder::class,
            tagSeeder::class,
            lesson_tagSeeder::class
        ]);
    }

}
