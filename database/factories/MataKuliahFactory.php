<?php

namespace Database\Factories;

use App\Models\Dosen;
use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $daftar_matkul = ['Matematika', 'Fisika Dasar', 'Kimia Dasar', 'Bahasa Inggris', 'Olahraga', 'Struktur Data', 'Kalkulus Dasar', 'Aljabar Dasar', 'Pemrograman Web', 'Artificial Inteligence'];
        $jurusan_id = $this->faker->numberBetween(1, Jurusan::count());
        $array_dosen = Dosen::where('jurusan_id', $jurusan_id)->get(); // jurusan id Dosen sama dengan id Jurusan

        return [
            'kode' => strtoupper($this->faker->unique()->bothify('??###')),
            'nama' => $this->faker->randomElement($daftar_matkul),
            'jumlah_sks' => $this->faker->numberBetween(1, 4),
            'jurusan_id' => $jurusan_id,
            'dosen_id' => $this->faker->randomElement($array_dosen),

        ];
    }
}
