<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Info extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getCreatedAtAtribute()
    {
        return Carbon::parse($this->attributes['created-at'])
        ->translatedFormat('1, d F Y');
    }

    public function scopeFilter($query, array $filters)
    { 
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('topik_idn', 'like', '%' . $search . '%' )
                    ->orWhere('penyelenggara', 'like', '%' . $search . '%');
        });

    }

    public function getRouteKeyName()
    {
        return 'topik_idn';
    }

}
