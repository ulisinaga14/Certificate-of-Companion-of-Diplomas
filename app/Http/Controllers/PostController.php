<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
   public function index(){
       $title = '';
       if(request('category')) {
           $category = Category::firstWhere('slug', request('category'));
           $title = ' in ' . $category->name;
       }

       if(request('author')) {
        $author = User::firstWhere('username', request('author'));
        $title = ' By ' . $author->name;
    }

    return view('posts',[
        "title" => "All Posts" . $title,
        "active" => "posts",
        //"posts" => Post::all()
        //tambahkan method with
        //jika ingin menambahkan lebih dari 1 tabel, kasih array lalu ambil parameternya
        "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        //filter didapat dari model, untuk melakukan query pencarian data
    ]);
    //paginate(7) merupakan method untuk menampilkan halaman sebanyak 7 halaman 
    //withQueryString() berfungsi membawa query string sebelumnya ke halaman yang ingin ditampilkan 
   }

   public function show(Post $post) //Route model binding yaitu kirimkan model Post, lalu ikat pada variabel $post
   //dimana variabel yang diterima harus sama dengan variabel yang dikirimkan
    {
    return view('post',[
        "title" => "Single Post",
        "active" => "posts",
        "post" => $post // dan yang dikirimkan tidak berdasarkan id lagi, tetapi langsung post
    ]);
   }
}
