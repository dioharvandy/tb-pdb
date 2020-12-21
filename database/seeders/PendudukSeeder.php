<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penduduk;
use App\Models\Kewarganegaraan;
use App\Models\Levelpendidikan;
use App\Models\Pekerjaan;
use App\Models\Kartukeluarga;
class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        Kartukeluarga::get()->each(function($kk){
            Penduduk::factory(5)->create(['kartu_keluarga_id'=>$kk->id]);
        });
        
    }
}
