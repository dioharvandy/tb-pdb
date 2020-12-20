<?php

namespace Database\Factories;

use App\Models\Penduduk;
use App\Models\Levelpendidikan;
use App\Models\Kartukeluarga;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama'=>$this->faker->name(),
            'nik'=>$this->faker->nik(),
            'level_pendidikan_id' =>$this->faker->randomElement(Levelpendidikan::select('id')->get()),
            'pekerjaan_id' =>$this->faker->randomElement(Pekerjaan::select('id')->get()),
            'keluarga_id'=> function() {
                return Kartukeluarga::factory()->create()->id;
            },
            'kewarganegaraan_id' =>$this->faker->randomElement(Kewarganegaraan::select('id')->get()),
            'tempat_lahir'=>$this->faker->city(),
            'tanggal_lahir'=>Carbon::create($this->faker->dateTimeBetween('-80 years', '-20 years')->format('Y-m-d')),
            'agama'=>$this->faker->randomElement(['islam', 'kristen', 'hindu', 'budha', 'konghucu']),
            'jenis_kelamin'=>$this->faker->randomElement(['laki-laki','perempuan']),
            'status_pernikahan'=>$this->faker->randomElement(['Menikah','Belum Menikah']),
            'status_keluarga'=>$this->faker->randomElement(['ayah','ibu','anak']),
            'ayah'=>$this->faker->name('male'),
            'ibu'=>$this->faker->name('female')
        ];
    }
}
