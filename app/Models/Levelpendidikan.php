<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Levelpendidikan extends Model
{
    use HasFactory;

    protected $table = "level_pendidikans";
    public $timestamps = false;
    
    public function penduduk(){
        return $this->hasMany('App\Models\Penduduk');
    }
}
