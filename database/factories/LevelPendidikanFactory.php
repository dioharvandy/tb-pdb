<?php

namespace Database\Factories;

use App\Models\Levelpendidikan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelPendidikanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Levelpendidikan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'=>$this->faker->unique()->randomElement(['tidak sekolah','sd', 'smp', 'sma','d1','d2','d3','d4', 's1', 's2','s3'])
        ];
    }
}
