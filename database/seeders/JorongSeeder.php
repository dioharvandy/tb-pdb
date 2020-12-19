<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jorong;
use App\Models\Nagari;
class JorongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Nagari::factory(15)->create()->each(function($nagari){
            Jorong::factory(4)->create(['nagari_id'=>$nagari->id]);
       });
    }
}
