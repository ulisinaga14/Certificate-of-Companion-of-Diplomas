<?php

namespace App\Http\Controllers;

use App\Models\Bahasa;
use App\Models\Info;
use App\Models\Karakter;
use App\Models\Kategori;
use App\Models\Keterampilan;
use App\Models\Magang;
use App\Models\Mahasiswa;
use App\Models\Organisasi;
use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'mahasiswa'){
            return view('dashboard.info.index',[
                'info' => Info::where('user_id', auth()->user()->id)->get(),
                'kategori' => Kategori::all(),
                'mahasiswa' => Mahasiswa::all(),
            ]);
        }elseif(Auth::user()->role =='admin'){
            return view('dashboard.info.index',[
                'info' => Info::first()->filter(request(['search']))->paginate(5),
                'kategori' => Kategori::all(),
                'mahasiswa' => Mahasiswa::all(),
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
        return view('dashboard.info.create',[
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
            'topik_idn' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'penyelenggara' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')){
            $file= $request->file('image')->getClientOriginalName();
            $request->file('image')->move('sertifikat',$file);
            $validatedData['image']  = $file;
        } 

            $validatedData ['user_id'] =  auth()->user()->id;
            $validatedData ['status'] =  '0';
            $validatedData['place'] = '-';
            $validatedData['topik_ing'] = '-';
            $validatedData['institution'] = '-';
            $validatedData['ket_idn'] = '- ';
            $validatedData['ket_ing'] = '- ';

            Info::create($validatedData);
            return redirect('/dashboard')->with('success', 'Data Info Berhasil Ditambahkan!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Info  $info
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
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        return view('dashboard.info.edit',[
            'info' => $info,
            'kategori' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Info  $info
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ket_idn' => 'required',
            'ket_ing' => 'required'
        ];
        
        
        $validatedData = $request->validate($rules);
        if ($request->hasFile('image')){
            $file= $request->file('image')->getClientOriginalName();
            $request->file('image')->move('sertifikat',$file);
            $validatedData['image']  = $file;
        }
        
        Info::where('id', $info->id)
                    ->update($validatedData);

        return redirect('/dashboard')->with('success', 'Data Info Berhasil Diedit!');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        Info::destroy($info->id);

        return redirect('/dashboard')->with('success', 'Data Info Berhasil Dihapus!');
    }
}
