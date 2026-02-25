<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\UnitPengolah;
use Illuminate\Http\Request;

class ProposalPrintController
{
    public function __invoke(Request $request)
    {
        $data = Proposal::query()
            ->with('unitPengolah')
            ->when($request->date_from, fn ($q) => $q->where('tanggal', '>=', $request->date_from))
            ->when($request->date_to, fn ($q) => $q->where('tanggal', '<=', $request->date_to))
            ->when($request->direktorat_id, fn ($q) => $q->where('direktorat_id', $request->direktorat_id))
            ->orderByDesc('tanggal')
            ->get();

        $selectedDirektorat = $request->direktorat_id
            ? UnitPengolah::find($request->direktorat_id)
            : null;

        return view('reports.proposal-print', compact('data', 'selectedDirektorat'));
    }
}