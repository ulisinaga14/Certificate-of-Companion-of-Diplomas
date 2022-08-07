<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function admprodi()
    {
        return $this->hasMany(Admprodi::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kompetensi()
    {
        return $this->hasMany(Kompetensi::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function capaian()
    {
        return $this->hasMany(Capaian::class);
    }

   public function getRouteKeyName()
   {
       return 'nama_prodi_idn';
   }

   public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_prodi_idn', 'like', '%' . $search . '%' )
                    ->orWhere('nama_prodi_ing', 'like', '%' . $search . '%');
        });

    }
}
