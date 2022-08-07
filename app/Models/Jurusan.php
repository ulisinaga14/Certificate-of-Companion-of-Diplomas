<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $guarded = ['id']; 
    
    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function penghargaan()
    {
        return $this->belongsTo(Penghargaan::class);
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class);
    }

    public function bahasa()
    {
        return $this->belongsTo(Bahasa::class);
    }

    public function karakter()
    {
        return $this->belongsTo(Karakter::class);
    }

    public function keterampilan()
    {
        return $this->belongsTo(keterampilan::class);
    }

    public function magang()
    {
        return $this->belongsTo(Magang::class);
    }

    public function getRouteKeyName()
    {
        return 'nama_jurusan';
    }

    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_jurusan', 'like', '%' . $search . '%' );
        });

    }
}
