<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Levelpendidikan;
class LevelPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Levelpendidikan::factory(10)->create();
    }
}
