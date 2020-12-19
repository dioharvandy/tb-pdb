<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jorong;
use App\Models\Nagari;
use App\Models\Kartukeluarga;
class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nagari::factory(10)->create()->each(function($nagari){
            Jorong::factory(5)->create(['nagari_id'=>$nagari->id])->each(function($jorong){
                Kartukeluarga::factory(10)->create(['jorong_id'=>$jorong->id]);
            });
       });
    }
}
