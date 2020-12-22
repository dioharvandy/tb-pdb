<?php

namespace App\Http\Controllers;
use App\Models\Kartukeluarga;
use App\Models\Jorong;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    public function index(Request $request){

        $search = $request->get('search');
        $jorong = Jorong::pluck('nama_jorong','id');
        $perpage = 25;

        if(!empty($search)){
            $kartukeluarga = Kartukeluarga::join('jorongs','kartu_keluargas.jorong_id','=','jorongs.id')
                                        ->join('nagaris','jorongs.nagari_id','=','nagaris.id')
                                        ->where('jorongs.nama_jorong', 'like',"%$search%")
                                        ->orWhere('kartu_keluargas.no', 'like',"%$search%")
                                        ->orWhere('nagaris.nama_nagari', 'like',"%$search%")
                                        ->orWhere('kartu_keluargas.tanggal_pencatatan', 'like',"%$search%")
                                        ->paginate($perpage);
        }
        else{
            $kartukeluarga = Kartukeluarga::paginate($perpage);
        }
        return view('kartukeluarga.index', compact('kartukeluarga','jorong'));  
    }

    public function create(Request $request){
        
       $validator = Validator::make($request->all(),[
        'jorong_id' => 'required',
             'no' => 'required|unique:kartu_keluargas',
             'tanggal_pencatatan' => 'required'
       ]);

        if ($validator->fails()) {
            return redirect('/kartu-keluarga')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        Kartukeluarga::create(['jorong_id'=>$request->jorong_id,
                               'no'=>$request->no,
                               'tanggal_pencatatan'=>$request->tanggal_pencatatan]);

        
        return redirect('/kartu-keluarga')->with('flash_message', 'Kartu Keluarga added!');
    }

    public function destroy($id){

        Penduduk::where('kartu_keluarga_id', $id)->delete();
        Kartukeluarga::destroy($id);
        return redirect('/kartu-keluarga')->with('flash_message', 'Kartu Keluarga Deleted!');

    }

    public function show($id){

       $kartukeluarga = Kartukeluarga::findOrFail($id);

        return view('kartukeluarga.show', compact('kartukeluarga'));  

    }

    public function edit($id){

        $jorong = Jorong::pluck('nama_jorong','id');
        $kartukeluarga = Kartukeluarga::findOrFail($id);

        return view('kartukeluarga.edit', compact('kartukeluarga','jorong'));

    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'jorong_id' => 'required',
                 'no' => 'required',
                 'tanggal_pencatatan' => 'required'
           ]);
    
            if ($validator->fails()) {
                return redirect('/kartu-keluarga')
                            ->withErrors($validator)
                            ->withInput();
            }
            
            $data = $request->all();
            $kartukeluarga = Kartukeluarga::findOrFail($id);
            $kartukeluarga->update($data);
    
            
            return redirect('/kartu-keluarga')->with('flash_message', 'Kartu Keluarga Updated!');

    }
}
