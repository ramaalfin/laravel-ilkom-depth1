<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        $faker->seed(123);

        $this->call(JurusanSeeder::class);
        $this->call(DosenSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(MataKuliahSeeder::class);
        $this->call(MahasiswaMatakuliahSeeder::class);
    }
}
