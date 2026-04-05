<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\TambahSuratKeluar;

class UserStatsOverview extends BaseWidget
{
    public static function canView(): bool
    {
        return auth()->user()?->type === 'user';
    }

    protected function getStats(): array
    {
        $userId = auth()->id();

        return [
            Stat::make('Pengajuan Saya', TambahSuratKeluar::where('user_id', $userId)->count())
                ->color('primary'),

            Stat::make('Disetujui', TambahSuratKeluar::where('user_id', $userId)->where('status', 'diterima')->count())
                ->color('success'),

            Stat::make('Pending', TambahSuratKeluar::where('user_id', $userId)->where('status', 'pending')->count())
                ->color('warning'),

            Stat::make('Ditolak', TambahSuratKeluar::where('user_id', $userId)->where('status', 'ditolak')->count())
                ->color('danger'),
        ];
    }
}