<?php

namespace App\Http\Controllers;

use App\Models\Bahasa;
use App\Models\Kategori;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BahasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.bahasa.index',[
            'bahasa' => Bahasa::all(),
            'kategori' => Kategori::all(),
            'mahasiswa' => Mahasiswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bahasa.create',[
            'kategori' => Kategori::all()
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
            'kategori_id' => 'required',
            'tempat' => 'required',
            'place' => 'required',
            'topik_idn' => 'required',
            'topik_ing' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'penyelenggara' => 'required',
            'institution' => 'required',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('Sertifikat-image');
        }

            $validatedData ['user_id'] =  auth()->user()->id;
            $validatedData['status'] = '0';

            Bahasa::create($validatedData);
            return redirect('/dashboard/info')->with('success', 'Data Bahasa Berhasil Ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function show(Bahasa $bahasa)
    {
        return view('dashboard.bahasa.show',[
            'bahasa' => $bahasa,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Bahasa $bahasa)
    {
        return view('dashboard.bahasa.edit',[
            'bahasa' => $bahasa,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bahasa $bahasa)
    {
        $rules = [
            'tempat' => 'required',
            'place' => 'required',
            'topik_idn' => 'required',
            'topik_ing' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'penyelenggara' => 'required',
            'institution' => 'required',
            'image' => 'image|file|max:1024',
        ];
        
        $validatedData = $request->validate($rules);
        
        if($request->file('image')){
            //jika gambar lama nya ada, hapus gambar lama, kemduian upload gambar baru
            //agar tidak menumpuk file gambar di database
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            //jika gambar lamanya tidak ada, maka upload gambar
            $validatedData['image'] = $request->file('image')->store('sertifikat-image');
        }

        $validatedData['kategori_id'] ='3';
        
        Bahasa::where('id', $bahasa->id)
                    ->update($validatedData);

        return redirect('/dashboard/info')->with('success', 'Data Bahasa Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bahasa  $bahasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahasa $bahasa)
    {
        Bahasa::destroy($bahasa->id);

        return redirect('/dashboard/bahasa')->with('success', 'Data Bahasa Berhasil Dihapus!');
    }
}
