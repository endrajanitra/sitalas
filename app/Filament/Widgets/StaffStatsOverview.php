<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\SuratMasuk;
use Carbon\Carbon;

class StaffStatsOverview extends BaseWidget
{
    public static function canView(): bool
    {
        return auth()->user()?->type === 'staf';
    }

    protected function getCards(): array
    {
        return [
            Stat::make('Total Surat', SuratMasuk::count()),

            Stat::make('Hari Ini', SuratMasuk::whereDate('tanggal_terima', today())->count())
                ->color('success'),

            Stat::make('Minggu Ini', SuratMasuk::whereBetween('tanggal_terima', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])->count())
                ->color('warning'),

            Stat::make('Bulan Ini', SuratMasuk::whereMonth('tanggal_terima', now()->month)->count())
                ->color('primary'),
        ];
    }
}