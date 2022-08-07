<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Keterampilan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeterampilanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.keterampilan.index',[
            'keterampilan' => Keterampilan::all(),
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
        return view('dashboard.keterampilan.create',[
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

            Keterampilan::create($validatedData);
            return redirect('/dashboard/info')->with('success', 'Data Keterampilan Berhasil Ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function show(Keterampilan $keterampilan)
    {
         return view('dashboard.keterampilan.show',[
            'keterampilan' => $keterampilan,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keterampilan $keterampilan)
    {
        return view('dashboard.keterampilan.edit',[
            'keterampilan' => $keterampilan,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keterampilan $keterampilan)
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

        $validatedData['kategori_id'] ='6';
        
        Keterampilan::where('id', $keterampilan->id)
                    ->update($validatedData);

        return redirect('/dashboard/info')->with('success', 'Data Keterampilan Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keterampilan  $keterampilan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keterampilan $keterampilan)
    {
        Keterampilan::destroy($keterampilan->id);

        return redirect('/dashboard/keterampilan')->with('success', 'Data Keterampilan$keterampilan Berhasil Dihapus!');
    }
}
