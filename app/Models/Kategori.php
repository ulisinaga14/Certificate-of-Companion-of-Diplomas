<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
    public function info()
    {
        return $this->hasMany(Info::class);
    }
    public function penghargaan()
    {
        return $this->hasMany(Penghargaan::class);
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
        return 'kategori_idn';
    }

    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('kategori_idn', 'like', '%' . $search . '%' )
                    ->orWhere('kategori_ing', 'like', '%' . $search . '%');
        });

    }
}
