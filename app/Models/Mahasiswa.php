<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_mahasiswa', 'like', '%' . $search . '%' )
            ->orwhere('nim', 'like', '%' . $search . '%');
        });

    }
         //whereHas, dia punya relationship apa, 'category' -> nama relationshipnya, diambil dari public 
         //function  category()
        //dijalankan jika requestnya ada kategori nya

    public function info()
    {
        return $this->hasMany(Info::class);
    }

    public function capaian()
    {
        return $this->hasMany(Capaian::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function getRouteKeyName()
    {
        return 'nama_mahasiswa';
    }
}
