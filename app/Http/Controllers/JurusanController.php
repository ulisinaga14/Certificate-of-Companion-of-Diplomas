<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Models\Prodi;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jurusan.index',[
            'jurusan' => Jurusan::first()->filter(request(['search']))->paginate(5),
            'prodi' => Prodi::all(),
            'title' => "Data Jurusan"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJurusanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJurusanRequest $request)
    {
        $validatedData = $request->validate([
            'id_jurusan' => 'required|unique:jurusans',
            'nama_jurusan' => 'required'
        ]);

        Jurusan::create($validatedData);

        return redirect('/dashboard/jurusan')->with('success', 'Data Jurusan Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        return view('dashboard.jurusan.show',[
            'jurusan' => $jurusan,
            'prodi' => Prodi::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return view('dashboard.jurusan.edit',[
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJurusanRequest  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJurusanRequest $request, Jurusan $jurusan)
    {
        $rules = [
            'nama_jurusan' => 'required'
        ];

        if($request->id_jurusan != $jurusan->id_jurusan){
            $rules['id_jurusan'] = 'required|unique:jurusans';
        }
        
        $validatedData = $request->validate($rules);

        Jurusan::where('id', $jurusan->id)
                    ->update($validatedData);

        return redirect('/dashboard/jurusan')->with('success', 'Data Jurusan Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->id);

        return redirect('/dashboard/jurusan')->with('success', 'Data Jurusan Berhasil Dihapus!');
    }
}
