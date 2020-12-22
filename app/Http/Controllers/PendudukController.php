<?php

namespace App\Http\Controllers;


use App\Models\Penduduk;
use App\Models\Nagari;
use App\Models\Kartukeluarga;
use App\Models\Kewarganegaraan;
use App\Models\Levelpendidikan;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    public function index(Request $request){

        $search = $request->get('search');
        $kartukeluarga = Kartukeluarga::pluck('no','id');
        $kewarganegaraan = Kewarganegaraan::pluck('nama_kewarganegaraan','id');
        $levelpendidikan = Levelpendidikan::pluck('nama_pendidikan','id');
        $pekerjaan = Pekerjaan::pluck('nama_pekerjaan','id');
        $perpage = 25;

        if(!empty($search)){
            $penduduk = Penduduk::join('kartu_keluargas','kartu_keluargas.id','=','penduduks.kartu_keluarga_id')
                                ->join('jorongs','kartu_keluargas.jorong_id','=','jorongs.id')
                                ->join('nagaris','jorongs.nagari_id','=','nagaris.id')
                                ->join('kewarganegaraans','kewarganegaraans.id','=','penduduks.kewarganegaraan_id')
                                ->join('level_pendidikans','level_pendidikans.id','=','penduduks.level_pendidikan_id')
                                ->join('pekerjaans','pekerjaans.id','=','penduduks.pekerjaan_id')
                                ->where('penduduks.nama_penduduk','like',"%$search%")
                                ->orWhere('penduduks.nik','like',"%$search%")
                                ->orWhere('penduduks.agama','like',"%$search%")
                                ->orWhere('jorongs.nama_jorong','like',"%$search%")
                                ->orWhere('nagaris.nama_nagari','like',"%$search%")
                                ->orWhere('pekerjaans.nama_pekerjaan','like',"%$search%")
                                ->orWhere('level_pendidikans.nama_pendidikan','like',"%$search%")
                                ->paginate($perpage);
        }
        else{
            $penduduk = Penduduk::paginate($perpage);
        }
        // dd($penduduk);
        return view('penduduk.index', compact('penduduk','kartukeluarga','kewarganegaraan','levelpendidikan','pekerjaan')); 
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
                                ->orWhere('penduduks.nik','like',"%$produktif%")
                                ->orWhere('penduduks.agama','like',"%$produktif%")
                                ->orWhere('jorongs.nama_jorong','like',"%$produktif%")
                                ->orWhere('nagaris.nama_nagari','like',"%$produktif%")
                                ->orWhere('pekerjaans.nama_pekerjaan','like',"%$produktif%")
                                ->orWhere('level_pendidikans.nama_pendidikan','like',"%$produktif%")
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
      public function create(Request $request){
        
        $validator = Validator::make($request->all(),[
         'kartu_keluarga_id' => 'required',
              'nama_penduduk' => 'required',
              'nik' => 'required|unique:penduduks',
              'tempat_lahir' => 'required',
              'tanggal_lahir' => 'required',
              'agama' => 'required',
              'jenis_kelamin' => 'required',
              'level_pendidikan_id' => 'required',
              'pekerjaan_id' => 'required',
              'status_pernikahan' => 'required',
              'status_keluarga' => 'required',
              'kewarganegaraan_id' => 'required',
              'ayah' => 'required',
              'ibu' => 'required',
        ]);
 
         if ($validator->fails()) {
             return redirect('/penduduk')
                         ->withErrors($validator)
                         ->withInput();
         }
         
         Penduduk::create(['kartu_keluarga_id'=>$request->kartu_keluarga_id,
                                'nama_penduduk'=>$request->nama_penduduk,
                                'tempat_lahir'=>$request->tempat_lahir,
                                'tanggal_lahir'=>$request->tanggal_lahir,
                                'agama'=>$request->agama,
                                'jenis_kelamin'=>$request->jenis_kelamin,
                                'level_pendidikan_id'=>$request->level_pendidikan_id,
                                'pekerjaan_id'=>$request->pekerjaan_id,
                                'status_pernikahan'=>$request->status_pernikahan,
                                'status_keluarga'=>$request->status_keluarga,
                                'kewarganegaraan_id'=>$request->kewarganegaraan_id,
                                'ayah'=>$request->ayah,
                                'ibu'=>$request->ibu,
                                'nik'=>$request->nik]);
 
         
         return redirect('/penduduk')->with('flash_message', 'Penduduk added!');
     }

    public function destroy($id){

        Penduduk::destroy($id);
        return redirect('/penduduk')->with('flash_message', 'Penduduk Deleted!');

    }

    public function show($id){

        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.show', compact('penduduk'));

    }

    public function edit($id){

        $kartukeluarga = Kartukeluarga::pluck('no','id');
        $kewarganegaraan = Kewarganegaraan::pluck('nama_kewarganegaraan','id');
        $levelpendidikan = Levelpendidikan::pluck('nama_pendidikan','id');
        $pekerjaan = Pekerjaan::pluck('nama_pekerjaan','id');
        $penduduk = Penduduk::findOrFail($id);

        return view('penduduk.edit', compact('penduduk','kartukeluarga','kewarganegaraan','levelpendidikan','pekerjaan'));

    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'kartu_keluarga_id' => 'required',
                 'nama_penduduk' => 'required',
                 'nik' => 'required',
                 'tempat_lahir' => 'required',
                 'tanggal_lahir' => 'required',
                 'agama' => 'required',
                 'jenis_kelamin' => 'required',
                 'level_pendidikan_id' => 'required',
                 'pekerjaan_id' => 'required',
                 'status_pernikahan' => 'required',
                 'status_keluarga' => 'required',
                 'kewarganegaraan_id' => 'required',
                 'ayah' => 'required',
                 'ibu' => 'required',
           ]);
    
            if ($validator->fails()) {
                return redirect('/penduduk')
                            ->withErrors($validator)
                            ->withInput();
            }

            $data = $request->all();
            $penduduk = Penduduk::findOrFail($id);
            $penduduk->update($data);

            return redirect('/penduduk')->with('flash_message', 'Penduduk Updated!');

    }
}
