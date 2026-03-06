<?php

namespace App\Http\Controllers;

use App\Models\TambahSuratKeluar;
use Barryvdh\DomPDF\Facade\Pdf;

class SuratKeluarPrintController extends Controller
{
    public function print($id)
    {
        $data = TambahSuratKeluar::with([
            'unitPengolah',
            'kode',
        ])->findOrFail($id);

        $pdf = Pdf::loadView('print.suratkeluar', compact('data'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('suratkeluar-'.$data->id.'.pdf');
    }
}