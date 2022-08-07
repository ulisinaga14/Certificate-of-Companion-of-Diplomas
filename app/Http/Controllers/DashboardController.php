<?php

namespace App\Http\Controllers;

use App\Models\Capaian;
use App\Models\Info;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function index(Info $info )
    {
        if(auth()->user()->role == 'superadmin'){
            return view('dashboard.superadmin.index',[
                'user' => User::all()
            ]);
        }
        elseif(auth()->user()->role == 'admin'){
            return view('dashboard.index',[
            'info' => Info::latest()->get(),
            'user' => User::all(),
            'mahasiswa' => Mahasiswa::all(),
            'total_mhs'=> Info::groupBy('user_id')->selectRaw('count(*) as total, user_id')->get(),
            'menunggu' => Info::where('status', 0)->count(),
            'terima' => Info::where('status', 1)->count(),
            'tolak' => Info::where('status', 2)->count()
            ]);
        }
        elseif(auth()->user()->role == 'penerjemah'){
            return view('dashboard.penerjemah.index',[
            'info' => Info::latest()->where('status', 1)->get(),
            'mahasiswa' => Mahasiswa::all()
            ]);
        }

        elseif ((auth()->user()->role == 'mahasiswa'))
        return view('dashboard.index',[
            'info' => Info::where('user_id', auth()->user()->id)->get(),
            'user' => User::all(),
            'kategori' => Kategori::all(),
            'mahasiswa' => Mahasiswa::where('user_id', auth()->user()->id)->get(),
            'daftar'=> Info::where('user_id', auth()->user()->id)->groupBy('kategori_id')->selectRaw('count(*) as total, kategori_id')->get(),
            'menunggu'=> Info::where('status', 0)->where('user_id', auth()->user()->id)->get(),
            'terima' => Info::where('status', 1)->where('user_id', auth()->user()->id)->get(),
            'tolak' => Info::where('status', 2)->where('user_id', auth()->user()->id)->get()->count(),
        ]);
    }

    public function terima($id)
    {
        Info::where("id", "$id")->update([
            'status' => "1"
        ]);
        return redirect('/dashboard')->with('success', 'Data Info Diterima!');
            
    }

    public function tolak($id)
    {
        Info::where("id", "$id")->update([
            'status' => "2"
        ]);
        return redirect('/dashboard')->with('success', 'Data Info Berhasil Ditolak!');

    }

    public function cetak_pdf()
    {
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->get();
        $info = Info::where('status',1)->get();
        $capaian = Capaian::all();
            $pdf = PDF::loadview('dashboard.skpi_pdf',  compact('mahasiswa', 'capaian', 'info'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]); 
       
          return $pdf->stream();
    }

}
