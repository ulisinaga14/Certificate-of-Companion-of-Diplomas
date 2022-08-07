<?php

use App\Http\Controllers\CapaianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PenerjemahController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuperadminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title"=> "Home",
        "active" => "home", 
    ]);
});

/* Route::get('/about', function () {
    return view('about',[
        
        "title" => "About",
        "active" => "about",
      "name" => "Dame Uli",
      "email" => "dame@gmail.com",
      "image" => "logo.png"  
    ]);
}); */

/* 
Route::get('/blog', [PostController::class, 'index'] ); */

//halaman single post
/* Route::get('/posts/{post:slug}', [PostController::class, 'show']);  */
//jika mengirimkan {post} saja, maka default yang dikirimkan cuma id nya saja sebagai unique identifier
//jika ditambahi :slug, maka data slug akan di query untuk mendapatkan post yang unik 
//mencari id , where slug = ..

//{category:slug} maksudnya adalah, data yg dikirim pada url adalah slugnya

/* Route::get('/categories/{category:slug}', function(Category $category){
    return view('posts',[
        'title' => "Post by Category : $category->name",
        'active' => 'categories', 
        'posts' => $category->posts->load('category', 'author'),
    ]);
}); */

/* Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()

    ]);
});  */

Route::get('/login', [LoginController::class, 'index'] )->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'] );
Route::post('/logout', [LoginController::class, 'logout'] );

Route::get('/register', [RegisterController::class, 'index'] )->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'] );

/* Route::get('/dashboard', function() {
    return view ('dashboard.index');
})->middleware('auth');
 */

//ketika ada request dengan method get , ke url dashboard/posts/cekSLug, maka panggil controllernya
/* Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth'); */

//function(..) merupakan route binding, yaitu mengarah ke mana
//{user:username} maksudnya adalah data yang dikirim pada url adalah username nya

/* Route::get('/authors/{author:username}', function(User $author){
    return view('posts',[
        'title' =>"Post by : $author->name", 
        'active' => 'blog',
        'posts' => $author->posts->load('category', 'author'),

    ]);
}); */

/* Route::resource('/dashboard/categories' , AdminCategoryController::class)->except('show')->middleware('admin');
 */
Route::resource('/dashboard/mahasiswa', MahasiswaController::class)->middleware('auth');
Route::resource('/dashboard/prodi', ProdiController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/jurusan', JurusanController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/kategori', KategoriController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/profil', ProfilController::class)->middleware('auth');

Route::get('/dashboard/password', [PasswordController::class, 'index'])->middleware('auth');
Route::post('/dashboard/password',[PasswordController::class, 'store']);

Route::resource('/dashboard/capaian', CapaianController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/info', InfoController::class)->middleware('auth');
Route::resource('/dashboard/superadmin', SuperadminController::class)->middleware('superadmin');
Route::resource('/dashboard/penerjemah', PenerjemahController::class)->middleware('penerjemah');

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth');
Route::get('/terima/{id}', [DashboardController::class, 'terima'])->middleware('auth');
Route::get('/tolak/{id}', [DashboardController::class, 'tolak'])->middleware('auth');
Route::get('/dashboard/cetak_pdf',[DashboardController::class, 'cetak_pdf'])->middleware('auth');
/* Route::resource('/dashboard', DashboardController::class)->middleware('admin'); */