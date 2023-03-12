<?php

namespace Database\Factories;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NID' => $this->faker->unique()->numerify('99######'),
            'nama' => $this->faker->name(),
            'jurusan_id' => $this->faker->numberBetween(1, Jurusan::count())
        ];
    }
}
