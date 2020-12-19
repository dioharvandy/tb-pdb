<?php

namespace Database\Factories;

use App\Models\Kartukeluarga;
use App\Models\Jorong;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class KartuKeluargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kartukeluarga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jorong_id'=> function() {
                return Jorong::factory()->create()->id;
            },
            'no'=>$this->faker->regexify('[1-9]{10}'),
            'tanggal_pencatatan'=>Carbon::create($this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'))
        ];
    }
}
