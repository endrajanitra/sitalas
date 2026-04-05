<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\TambahSuratKeluar;

class UserChartPengajuan extends ChartWidget
{
    protected ?string $heading = 'Pengajuan Saya per Bulan';

    public static function canView(): bool
    {
        return auth()->user()?->type === 'user';
    }

    protected function getData(): array
    {
        $userId = auth()->id();

        $data = collect(range(1, 12))->map(function ($month) use ($userId) {
            return TambahSuratKeluar::where('user_id', $userId)
                ->whereMonth('tanggal_surat', $month)
                ->count();
        });

        return [
            'datasets' => [
                [
                    'label' => 'Pengajuan',
                    'data' => $data,
                ],
            ],
            'labels' => [
                'Jan','Feb','Mar','Apr','Mei','Jun',
                'Jul','Agu','Sep','Okt','Nov','Des'
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}