<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = "penduduks";

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
        return $this->belongsTo('App\Models\Kewarganegaraa');
    }
}
