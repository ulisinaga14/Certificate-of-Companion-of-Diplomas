<?php

namespace App\Http\Controllers;

use App\Models\Capaian;
use App\Models\Prodi;
use Illuminate\Http\Request;

class CapaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.capaian.index',[
            'capaian' => Capaian::all(),
            'prodi' => Prodi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.capaian.create',[
            'prodi' => Prodi::all()
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
            'prodi_id' => 'required',
            'ket_idn' => 'required',
            'ket_ing' => 'required'
        ]);

        Capaian::create($validatedData);

        return redirect('/dashboard/capaian')->with('success', 'Data Prodi Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Capaian  $capaian
     * @return \Illuminate\Http\Response
     */
    public function show(Capaian $capaian)
    {
        return view('dashboard.capaian.show',[
            'capaian' => $capaian
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Capaian  $capaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Capaian $capaian)
    {
        return view('dashboard.capaian.edit',[
            'capaian' => $capaian,
            'prodi' => Prodi::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Capaian  $capaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capaian $capaian)
    {
        $rules = [
            'prodi_id' => 'required',
            'ket_idn' => 'required',
            'ket_ing' => 'required'
        ];


        $validatedData = $request->validate($rules);

        Capaian::where('id', $capaian->id)
                ->update($validatedData);

        return redirect('/dashboard/capaian')->with('success', 'Data Capaian Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capaian  $capaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capaian $capaian)
    {
        Capaian::destroy($capaian->id);

        return redirect('/dashboard/capaian')->with('success', 'Data Prodi Baru Berhasil Dihapus!');
    }
}
