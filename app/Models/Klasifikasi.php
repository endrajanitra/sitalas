<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TambahSuratKeluar;

class Klasifikasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'klasifikasi',
    ];

    public function suratKeluar()
    {
        return $this->hasMany(TambahSuratKeluar::class, 'klasifikasi_id');
    }
}
