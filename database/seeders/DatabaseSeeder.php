<?php

namespace Database\Seeders;

use App\Models\Kewarganegaraan;
use App\Models\Levelpendidikan;
use App\Models\Penduduk;
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
        $this->call(KartuKeluargaSeeder::class);
        $this->call(KewarganegaraanSeeder::class);
        $this->call(LevelPendidikanSeeder::class);
        $this->call(PekerjaanSeeder::class);
        $this->call(PendudukSeeder::class);
    }
}
