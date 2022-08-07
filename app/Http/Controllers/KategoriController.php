<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kategori.index',[
            'kategori' => Kategori::first()->filter(request(['search']))->get(),
            'title' => "Data Kategori Kegiatan"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori.create');
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
            'id_kategori' => 'required|unique:kategoris',
            'kategori_idn' => 'required',
            'kategori_ing' => 'required'
        ]);

        Kategori::create($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'Data Kategori Kegiatan Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        return view('dashboard.kategori.show',[
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit',[
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $rules = [
            'kategori_idn' => 'required',
            'kategori_ing' => 'required'
        ];

        if($request->id_kategori != $kategori->id_kategori){
            $rules['id_kategori'] = 'required|unique:kategoris';
        }
        
        $validatedData = $request->validate($rules);

        Kategori::where('id', $kategori->id)
                    ->update($validatedData);

        return redirect('/dashboard/kategori')->with('success', 'Data Kategori Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);

        return redirect('/dashboard/kategori')->with('success', 'Data Kategori Berhasil Dihapus!');
    }
}
