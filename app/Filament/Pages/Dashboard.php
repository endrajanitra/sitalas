<?php

namespace App\Filament\Pages;
use Illuminate\Support\Facades\Auth;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        if (! Auth::user()?->isAdmin()) {
            return []; // ⛔ selain admin → kosong
        }

        return [
            \App\Filament\Widgets\StatsOverview::class,

            \App\Filament\Widgets\ChartSuratMasuk::class,
            \App\Filament\Widgets\ChartSuratKeluar::class,

            \App\Filament\Widgets\SuratMasukTable::class,
            \App\Filament\Widgets\SuratKeluarTable::class,
        ];
    }

    public function getColumns(): int | array
    {
        return 2;
    }
}