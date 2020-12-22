<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartukeluarga extends Model
{
    use HasFactory;

    protected $table = "kartu_keluargas";
    public $timestamps = false;
    protected $fillable = ['jorong_id', 'no','tanggal_pencatatan' ];

    public function jorong(){
                return $this->belongsTo('App\Models\Jorong');
    }
    public function penduduk(){
        return $this->hasMany('App\Models\Penduduk');
    }
}
