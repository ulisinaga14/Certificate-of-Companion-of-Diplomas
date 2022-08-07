<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
       /*  1. Tangkap semua data yang dimasukkan dalam form register menggunakan method request
        2. Tampilkan isinya apa  */

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'

        ]);

        //ambil data password. kemudian enkripsi 
        //$validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'mahasiswa';
        //simpan ke dalam variabel validate data untuk menyimpan data validasi
        //kemudian masukkan ke database

        User::create($validatedData);

        /* 3. lakukan validasi data menggunakan method validate */
        
        /* $request->session()->flash('success', 'Registration Successfull!! Please Login'); */
        return redirect('/login')->with('success', 'Registration Successfull!! Please Login');
    }
}

/* CSRF adalah sebuah teknik serangan terhadap website kita. dengan memalsukan rquest dari website yang lain 
cara menjaga requestnya yang dikirimkan dari web kita, menguanakan csrf token , yaitu mengecek request web yang
dikirimkan = request yang kita punya. 
CSRF digunakan untuk method post  */