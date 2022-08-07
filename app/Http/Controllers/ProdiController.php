<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.prodi.index',[
            'prodi' => Prodi::first()->filter(request(['search']))->paginate(5),
            'title' => "Data Program Studi"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.prodi.create',[
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
            'id_prodi' => 'required|unique:prodis',
            'jurusan_id' => 'required',
            'nama_prodi_idn' => 'required',
            'nama_prodi_ing' => 'required',
            'status_akreditasi' => 'required',
            'no_akreditasi' => 'required',
            'jenjang_kualifikasi' => 'required',
            'pendidikan_lanjutan' => 'required',
            'program_pendidikan_tinggi' => 'required',
            'jenis_jenjang_pendidikan' => 'required',
            'gelar_idn' => 'required',
            'gelar_ing' => 'required'
        ]);

        Prodi::create($validatedData);

        return redirect('/dashboard/prodi')->with('success', 'Data Prodi Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        return view('dashboard.prodi.show',[
            'prodi' => $prodi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        return view('dashboard.prodi.edit',[
            'prodi' => $prodi,
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        $rules = [
            'jurusan_id' => 'required',
            'nama_prodi_idn' => 'required',
            'nama_prodi_ing' => 'required',
            'status_akreditasi' => 'required',
            'no_akreditasi' => 'required',
            'jenjang_kualifikasi' => 'required',
            'pendidikan_lanjutan' => 'required',
            'program_pendidikan_tinggi' => 'required',
            'jenis_jenjang_pendidikan' => 'required',
            'gelar_idn' => 'required',
            'gelar_ing' => 'required'
        ];

        if($request->id_prodi != $prodi->id_prodi){
            $rules['id_prodi'] = 'required|unique:prodis';
        }

        $validatedData = $request->validate($rules);

        Prodi::where('id', $prodi->id)
                ->update($validatedData);

        return redirect('/dashboard/prodi')->with('success', 'Data Mahasiswa Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        Prodi::destroy($prodi->id);

        return redirect('/dashboard/prodi')->with('success', 'Data Prodi Baru Berhasil Dihapus!');
    }
}
