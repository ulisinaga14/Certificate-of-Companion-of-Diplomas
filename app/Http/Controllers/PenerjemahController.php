<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategori;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenerjemahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.penerjemah.index',[
            'info' => Info::all(),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        return view('dashboard.info.show',[
            'info' => $info,
            'kategori' => Kategori::all(),
            'mahasiswa' => Mahasiswa::all()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        return view('dashboard.info.edit',[
            'info' =>$info,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        $rules = [
            'kategori_id' => 'required',
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

        
        Info::where('id', $info->id)
                    ->update($validatedData);

        return redirect('/dashboard/penerjemah')->with('success', 'Data Info Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
