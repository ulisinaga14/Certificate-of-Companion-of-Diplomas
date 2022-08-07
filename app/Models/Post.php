<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    //fillable merupakan data yang boleh diisi
    //protected $fillable = [
    //    'title','excerpt','body'
    //];

    //guarded merupakan data yg tidak boleh diisi, sisanya boleh diisi
    protected $guarded =['id'];
    protected $with = ['author', 'category'];

    //untuk membuat relasi antar tabel, maka harus membuat method baru
    //nama methodnya = nama model
    //misal ingin terhubung dgn tabel kategori
    
        //jika ingin 1 postingan memiliki 1 kategori, maka relasinya
        //adalah one to one, dan dalam laravel disebut belongsTo
        //one to many, disebut has Many
    public function category(){
        return $this->belongsTo(Category::class); 
    }

    //public function user() -> jika ingin mengganti user menjadi author, panggil parameter foreign key dari user, 
    //yaitu user_id, dimana user_id merupakan nama lain/aliasnya dari author
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%' )
                    ->orWhere('body', 'like', '%' . $search . '%');
        });

            //join tabel post yang sesuai dengan kriteria yg ingin dicari dan merupakan juga bagian dari kategori,
            //menggunakan method whereHas
            //tentukan rekationship query nya
            //whereHas -> punya relationship ke .. , dan akan melakukan apa
        
        $query->when($filters['category'] ?? false, function($query, $category) {    
                //join table post dengan category
                //mencari postingan yang ada pada pencarian dan juga merupakan bagian dari kategori
            return $query->whereHas('category', function ($query) use ($category)
         {
                 $query->where('slug', $category); //dimana slugnya = kategori
            });
        });  

        $query->when($filters['author'] ?? false, function($query, $author){
            return $query->whereHas('author', function($query) use ($author){
                $query->where('username', $author);
            });
        });
        

         //whereHas, dia punya relationship apa, 'category' -> nama relationshipnya, diambil dari public 
         //function  category()
        //dijalankan jika requestnya ada kategori nya

    }

    public function getRouteKeyName()
    /* cuztomizing the key, dibutuhkan saat eloquent mencari model menggunakan kolom selain id
    kita harus memberitau kolomnya di dalam model, tulis di route parameter
    jika kita ingin modelnya selalu menggunakan kolom di database selain id(tidak manual),
    maka ditimpa menggunakan method getRouteKeyName di dalam model */
    
    /* pada return dibawah ini, menunjukkan setiap route memberikan nilai slug */
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

        //jika $filters ada search , maka tampilkan filter search nya, kalo tidak ada maka jangan jalankan perintah query

       //if(isset($filters['search']) ? $filters['search'] : false ) {
        //return $query->where('title', 'like', '%' . $filters['search']. '%' )
        //           ->orWhere('body', 'like', '%' . $filters['search']. '%');
       //}

        //untuk meringkas perintah isset, gunakan null coalesing operator, yaitu '??'.
        //jika perintah  benar, maka jalankan perintah pertama, jika tidak ,abaikan 
        //mengunakan when
        //jika bernilai true, maka balik ke when lalu berikan closuers/ perntah apa yg ingin dijalankan
        //yaitu jalankan perintah query, dan ambil nilai search