<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UnitPengolah;
class AsistenBiro extends Model
{
    use HasFactory;

    protected $fillable= [
        'asisten_unit_pengolah_id',
        'biro_unit_pengolah_id',
    ];

    public function asistenUnit()
    {
        return $this->belongsTo(UnitPengolah::class, 'asisten_unit_pengolah_id');
    }

    public function biroUnit()
    {
        return $this->belongsTo(UnitPengolah::class, 'biro_unit_pengolah_id');
    }
}
