<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{   /* login.index merupakan folder login dan di dalamnya ada file index */
    public function index(){
        return view('login.index',[
            'title' => 'Login',
             'active' => 'login'
        ]);
        
    }

    public function authenticate(Request $request){
        //validasi email dan passwordnya

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //jalankan kelas auth lalu attemp dari credential 

        //request session regenerate dijalankan untuk menghindari teknik hacking yaitu session fixation
        //yaitu melakukan hacking menggunakan session yang digunakan sebelumnya, sehingga tidak melakukan login ulanh
        //karena sessionnya masih sama
        //sehingga diperlukan generate ulang sessionnya

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        //jika auth nya gagal, maka akan dikirimkan eror, dan dikembalikan ke halaman login sambil dikirimkan erornya
        return back()->with('loginError', 'Login Failed!!');
    }

    public function logout(Request $request){
        Auth::logout(); //logoout auth nya
 
        $request->session()->invalidate(); //invalidate session nya supaya tidak dipakai lagi
     
        $request->session()->regenerateToken(); //buat baru supaya tidak dibajak
     
        return redirect('/');
    }
}
