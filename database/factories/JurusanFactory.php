<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jurusan>
 */
class JurusanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jurusan = ['Teknik Informatika', 'Teknik Komputer', 'Sistem Informasi'];
        return [
            'nama' => $this->faker->unique()->randomElement($jurusan),
            'kepala_jurusan' => $this->faker->name(),
            'daya_tampung' => $this->faker->numberBetween(5, 8)*10,
        ];
    }
}
