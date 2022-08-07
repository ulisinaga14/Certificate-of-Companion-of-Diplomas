<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data nya
        //ambil user id dari Post yang sama dengan user yang sedang login

        return view('dashboard.posts.index',[
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.posts.create',[
            'categories' => Category::all()
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
        //validasi data , dengan memberikan rulw untuk setiap field
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', 
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        //jika gambar ada isinya, maka tambahi 1 buah validated lagi
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    
        //insert data
        //Panggil modelnya
        Post::create($validatedData);

        //balikkan ke halaman post
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view ('dashboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //validasi data , dengan memberikan rulw untuk setiap field
        $rules = ([
            'title' => 'required|max:255',
            'category_id' => 'required', 
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        //karena slug adalah unik, tidak boleh sama, maka ketika ingin mengupdate slug
        //cek dulu, apakah slug yang baru = slug yang lama, maka jangan kasi validasi
        //tetapi jika slug nya beda, maka beri validasi
        //$post adalah data lama yang ada pada database kita
        if($request->slug != $post->slug){
            $rules ['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        //cek apakah ada image baru/tidak, kalau tidak maka gunakan  iamge lama
        //kalo baru, image diambil pada saat upload

        //jika ada gambar baru yang digunakan untuk mengganti gambar yang lama
        //hapus dulu gambar yg lama, kemudian upload gambar yg baru
        if($request->file('image')){
            //jika gambar lama nya ada, hapus gambar lama, kemduian upload gambar baru
            //agar tidak menumpuk file gambar di database
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            //jika gambar lamanya tidak ada, maka upload gambar
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    
        //update data
        //Panggil modelnya
        Post::where('id', $post->id) 
            ->update($validatedData);

        //balikkan ke halaman post
        return redirect('/dashboard/posts')->with('success', 'New post has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //ketika ingin menghapus field tertentu, file nya juga dihapus sekalian
        if($post->image){
            Storage::delete($post->image);
        }

         Post::destroy($post->id);

        //balikkan ke halaman post
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');

    }

    //method untuk menangani pengambilan slug
    //request akan didapatkan ketika kita berpindah tab akan mengambil isi dari inputan title
    //diperlukan SlugService untuk membuat slug, diambil dari class Post, mengambil field slug supaya diubah ke field slug
    //lalu title nya apa yang diambil dari $request yang key nya title, karena ada pada url, ambil title langsung
    //$slug akan menampilkan hasilnya dari apa yang diambil dari title nya
    //juga akan mengecek di dalam database, apakah sudah ada database yang sama, dimana slug harus unique
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
