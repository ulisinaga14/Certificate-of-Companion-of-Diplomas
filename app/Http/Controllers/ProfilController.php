<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profil.index',[
            'profil' => User::all(),
            'jurusan' =>Jurusan::all(),
            'mahasiswa' => Mahasiswa::all()
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.profil.edit',[
            'user' => User::all(),
            'jurusan' =>Jurusan::all(),
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required'
        ];

        if($request->email != auth()->user()->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }

        $validatedData = $request->validate($rules);
        if ($request->hasFile('image')){
            $file= $request->file('image')->getClientOriginalName();
            $request->file('image')->move('profil',$file);
            $validatedData['image']  = $file;
        } 
        $validatedData['role'] = Auth::user()->role;

    
        User::where('id', Auth::user()->id)
        ->update($validatedData);
    
        return redirect('/dashboard/profil')->with('success', 'Foto Profil Berhasil Diedit!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->image){
            Storage::delete($user->image);
        }
        User::destroy($user->id);
        return redirect('/dashboard/profil')->with('success', 'Foto Profil Berhasil Dihapus!'); 
    }
}
