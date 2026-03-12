<?php

namespace App\Filament\Exports;

use App\Models\Penerima;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportSuratMasukExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function __construct(
        protected array $filters = []
    ) {}

    public function collection()
    {
        return $this->getQuery()->get();
    }

    public function headings(): array
    {
        return [
            'Tgl Masuk',
            'Tgl Surat',
            'Pengirim',
            'Unit Pengolah',
            'Sifat Surat',
            'Kode',
            'Perihal',
            'No Surat',
            'No Box',
            'No Rak',
        ];
    }

    public function map($row): array
    {
        return [
            optional($row->tanggal_terima)?->format('d-m-Y'),
            optional($row->tanggal_surat)?->format('d-m-Y'),
            $row->pengirim,
            $row->unitPengolah?->direktorat,
            $row->sifatSurat?->sifat_surat,
            $row->kodeSurat?->kode,
            $row->perihal,
            $row->no_surat,
            $row->no_box,
            $row->no_rak,
        ];
    }

    protected function getQuery(): Builder
    {
        return Penerima::query()
            ->with([
                'unitPengolah',
                'kodeSurat',
                'sifatSurat',
            ])
            ->when(
                $this->filters['tanggal_dari']['tanggal_dari'] ?? null,
                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_terima', '>=', $date)
            )
            ->when(
                $this->filters['tanggal_sampai']['tanggal_sampai'] ?? null,
                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_terima', '<=', $date)
            )
            ->when(
                $this->filters['unit_pengolah']['direktorat_id'] ?? null,
                fn (Builder $query, $id): Builder => $query->where('direktorat_id', $id)
            )
            ->when(
                $this->filters['sifat_surat']['sifat_surat_id'] ?? null,
                fn (Builder $query, $id): Builder => $query->where('sifat_surat_id', $id)
            )
            ->orderByDesc('tanggal_terima');
    }
}