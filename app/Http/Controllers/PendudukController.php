<?php

namespace App\Http\Controllers;
use App\Models\Penduduk;
use App\Models\Nagari;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index(Request $request){

        $search = $request->get('search');
        $perpage = 25;

        if(!empty($search)){
            $penduduk = Penduduk::join('kartu_keluargas','kartu_keluargas.id','=','penduduks.kartu_keluarga_id')
                                ->join('jorongs','kartu_keluargas.jorong_id','=','jorongs.id')
                                ->join('nagaris','jorongs.nagari_id','=','nagaris.id')
                                ->join('kewarganegaraans','kewarganegaraans.id','=','penduduks.kewarganegaraan_id')
                                ->join('level_pendidikans','level_pendidikans.id','=','penduduks.level_pendidikan_id')
                                ->join('pekerjaans','pekerjaans.id','=','penduduks.pekerjaan_id')
                                ->where('penduduks.nama_penduduk','like',"%$search%")
                                ->paginate($perpage);
        }
        else{
            $penduduk = Penduduk::paginate($perpage);
        }
        // dd($penduduk);
        return view('penduduk.index', compact('penduduk')); 
      }

      public function laporan(Request $request){
          
        $produktif = $request->get('produktif');
        $nagari = $request->get('nagari');
        $nagariPendidikan = $request->get('nagariPendidikan');
        $getNagari = Nagari::pluck('nama_nagari','id');
        $perpage = 10;

            if(!empty($produktif)){
            $penduduk = Penduduk::join('kartu_keluargas','kartu_keluargas.id','=','penduduks.kartu_keluarga_id')
                                ->join('jorongs','kartu_keluargas.jorong_id','=','jorongs.id')
                                ->join('nagaris','jorongs.nagari_id','=','nagaris.id')
                                ->join('kewarganegaraans','kewarganegaraans.id','=','penduduks.kewarganegaraan_id')
                                ->join('level_pendidikans','level_pendidikans.id','=','penduduks.level_pendidikan_id')
                                ->join('pekerjaans','pekerjaans.id','=','penduduks.pekerjaan_id')
                                ->where([['penduduks.nama_penduduk','like',"%$produktif%"],
                                         ['tanggal_lahir', '<=', date('Y-m-d', strtotime('-14 years'))],
                                         ['tanggal_lahir', '>=', date('Y-m-d', strtotime('-64 years'))]       
                                       ])
                                ->paginate($perpage);
            }
            else{
                $penduduk = Penduduk::where([['tanggal_lahir', '<=', date('Y-m-d', strtotime('-14 years'))],
                                            ['tanggal_lahir', '>=', date('Y-m-d', strtotime('-64 years'))]       
                                    ])->paginate($perpage);
            }

                $pendudukNagari = Penduduk::join('kartu_keluargas','kartu_keluargas.id','=','penduduks.kartu_keluarga_id')
                                ->join('jorongs','kartu_keluargas.jorong_id','=','jorongs.id')
                                ->join('nagaris','jorongs.nagari_id','=','nagaris.id')
                                ->join('kewarganegaraans','kewarganegaraans.id','=','penduduks.kewarganegaraan_id')
                                ->join('level_pendidikans','level_pendidikans.id','=','penduduks.level_pendidikan_id')
                                ->join('pekerjaans','pekerjaans.id','=','penduduks.pekerjaan_id')
                                ->where([['nagaris.id','=', $nagari]])
                                ->paginate($perpage);

                $pendudukNagariPendidikan = Penduduk::join('kartu_keluargas','kartu_keluargas.id','=','penduduks.kartu_keluarga_id')
                                ->join('jorongs','kartu_keluargas.jorong_id','=','jorongs.id')
                                ->join('nagaris','jorongs.nagari_id','=','nagaris.id')
                                ->join('kewarganegaraans','kewarganegaraans.id','=','penduduks.kewarganegaraan_id')
                                ->join('level_pendidikans','level_pendidikans.id','=','penduduks.level_pendidikan_id')
                                ->join('pekerjaans','pekerjaans.id','=','penduduks.pekerjaan_id')
                                ->where('nagaris.id','=', $nagariPendidikan)
                                ->where(function($q) {
                                    $q->where('level_pendidikans.nama_pendidikan', '=',"tidak sekolah")
                                    ->orWhere('level_pendidikans.nama_pendidikan', '=',"sd")
                                    ->orWhere('level_pendidikans.nama_pendidikan', '=',"smp");
                                })
                                ->paginate($perpage);

            // dd($pendudukNagariPendidikan);
            return view('penduduk.laporan', compact('penduduk','getNagari','pendudukNagari','pendudukNagariPendidikan')); 
      }
}
