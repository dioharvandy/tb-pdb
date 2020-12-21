<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Penduduk extends Model
{
    use HasFactory;

    protected $table = "penduduks";

    public function getAge(){
        $this->tanggal_lahir->diff(Carbon::now())
             ->format('%y years, %m months and %d days');
    }


    public function kartu_keluarga(){
        return $this->belongsTo('App\Models\Kartukeluarga');
    }
    public function level_pendidikan(){
        return $this->belongsTo('App\Models\Levelpendidikan');
    }
    public function pekerjaan(){
        return $this->belongsTo('App\Models\Pekerjaan');
    }
    public function kewarganegaraan(){
        return $this->belongsTo('App\Models\Kewarganegaraan');
    }

}
