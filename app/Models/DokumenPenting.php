<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnitPengolah;

class DokumenPenting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tgl_terima',
        'tgl_surat',
        'no_surat',
        'jumlah_sk',
        'direktorat_id',
        'pengirim',
        'perihal',
        'kontak_person',
        'catatan',
        'upload_file',
        'kirim_ke_tujuan',
    ];

     public function unitPengolah()
    {
        return $this->belongsTo(UnitPengolah::class, 'direktorat_id');
    }
}
