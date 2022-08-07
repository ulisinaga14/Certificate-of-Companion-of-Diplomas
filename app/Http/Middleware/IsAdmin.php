<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        //sebelum menampilkan data kategori, cek apakah sudah login/belum
        //jika user belum login, kasih pesan abort dengan status 403 /forbidden
        
        //ketika sudah login, tetapi bukan sebagai admin
        //jika user yang sedang login bukan seorang admin, maka kasi pesan eror abort
        
        if(auth()->guest() || !auth()->user()->is_admin){
            //jika usernya bukan admin (!auth), maka kasih forbidden
            abort(403);
        }
        //guest digunakan ketika belum login
        //check digunakan ketika sudah login

        /* menggunakan cara yg lain */
        /* if(!auth()->check() || auth()->user()->username !== 'dameuli'){
            abort(403);
        } */
 
        return $next($request);
    }
}
