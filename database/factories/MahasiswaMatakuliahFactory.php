<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MahasiswaMatakuliah>
 */
class MahasiswaMatakuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mahasiswa_id = $this->faker->numberBetween(1, Mahasiswa::count());
        $jurusan_mahasiswa_id = Mahasiswa::find($mahasiswa_id)->jurusan_id; // mencari id jurusan Mahasiswa
        $array_matkul = Matakuliah::where('jurusan_id', $jurusan_mahasiswa_id)->get('id'); // kumpulan id mata kuliah dari jurusan yang sama dengan id jurusan mahasiswa
        return [
            'mahasiswa_id' => $mahasiswa_id,
            'matakuliah_id' => $this->faker->randomElement($array_matkul),
        ];
    }
}
