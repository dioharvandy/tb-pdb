<?php

namespace App\Http\Controllers;
use App\Models\Kartukeluarga;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    public function index(Request $request){

        $search = $request->get('search');
        $perpage = 25;

        if(!empty($search)){
            $kartukeluarga = Kartukeluarga::join('jorongs','kartu_keluargas.jorong_id','=','jorongs.id')
                                        ->join('nagaris','jorongs.nagari_id','=','nagaris.id')
                                        ->where('jorongs.nama_jorong', 'like',"%$search%")
                                        ->paginate($perpage);
        }
        else{
            $kartukeluarga = Kartukeluarga::paginate($perpage);
        }
        return view('kartukeluarga.index', compact('kartukeluarga'));  
    }
}
