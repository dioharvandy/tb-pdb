<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = "pekerjaans";
    public $timestamps = false;
    
    public function penduduk(){
        return $this->hasMany('App\Models\Penduduk');
    }
}
