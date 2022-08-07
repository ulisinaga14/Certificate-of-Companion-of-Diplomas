<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            return view('dashboard.mahasiswa.index',[
                'prodi' => Prodi::all(),
                'mahasiswa' => Mahasiswa::first()->filter(request(['search']))->paginate(5)
            ]);
        }
        elseif(Auth::user()->role == 'mahasiswa'){
            return view('dashboard.mahasiswa.index',[
                'prodi' => Prodi::all(),
                'mahasiswa' => Mahasiswa::where('user_id', auth()->user()->id)->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mahasiswa.create',[
            'prodi' => Prodi::all(),
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|max:20|unique:mahasiswas',
            'prodi_id' => 'required',
            'jurusan_id' => 'required',
            'ttl' => 'required',
            'tahun_masuk' => 'required',
            'tahun_lulus' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['nama_mahasiswa'] = auth()->user()->name;
        $validatedData['no_ijazah'] = 'Belum diisi';
        $validatedData['no_skpi'] = 'Belum diisi';

        Mahasiswa::create($validatedData);

        return redirect('/dashboard')->with('success', 'Data Mahasiswa Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.show',[
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.edit',[
            'mahasiswa' => $mahasiswa,
            'prodi' => Prodi::all(),
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = [
            'prodi_id' => 'required',
            'nama_mahasiswa' => 'required',
            'ttl' => 'required',
            'tahun_masuk' => 'required',
            'tahun_lulus' => 'required',
            'no_skpi' => 'required',
            'no_ijazah' => 'required'
        ];

        if($request->nim != $mahasiswa->nim){
            $rules['nim'] = 'required|max:20|unique:mahasiswas';
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Mahasiswa::where('id', $mahasiswa->id)
                ->update($validatedData);

        return redirect('/dashboard')->with('success', 'Data Mahasiswa Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::destroy($mahasiswa->id);

        return redirect('/dashboard/mahasiswa')->with('success', 'Data Mahasiswa  Berhasil Dihapus!');
    }
}
