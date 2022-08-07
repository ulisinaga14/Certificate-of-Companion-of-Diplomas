<?php

namespace App\Http\Controllers;

use App\Models\Karakter;
use App\Models\Kategori;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KarakterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.karakter.index',[
            'karakter' => Karakter::all(),
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
        return view('dashboard.karakter.create',[
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
            Karakter::create($validatedData);
            return redirect('/dashboard/info')->with('success', 'Data Pendidikan Karakter Berhasil Ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karakter  $karakter
     * @return \Illuminate\Http\Response
     */
    public function show(Karakter $karakter)
    {
        return view('dashboard.karakter.show',[
            'karakter' => $karakter,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karakter  $karakter
     * @return \Illuminate\Http\Response
     */
    public function edit(Karakter $karakter)
    {
        return view('dashboard.karakter.edit',[
            'karakter' => $karakter,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karakter  $karakter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karakter $karakter)
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

        $validatedData['kategori_id'] ='5';
        
        Karakter::where('id', $karakter->id)
                    ->update($validatedData);

        return redirect('/dashboard/info')->with('success', 'Data Pendidikan Karakter Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karakter  $karakter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karakter $karakter)
    {
        Karakter::destroy($karakter->id);

        return redirect('/dashboard/karakter')->with('success', 'Data Peendidikan Karakter Berhasil Dihapus!');
    }
}
