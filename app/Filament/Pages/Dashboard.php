<?php

namespace App\Filament\Pages;
use Illuminate\Support\Facades\Auth;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
        public function getWidgets(): array
        {
            $user = Auth::user();

            // 🔷 ADMIN
            if ($user?->isAdmin()) {
                return [
            \App\Filament\Widgets\StatsOverview::class,
            \App\Filament\Widgets\ChartSuratMasuk::class,
            \App\Filament\Widgets\ChartSuratKeluar::class,
            \App\Filament\Widgets\SuratMasukTable::class,
            \App\Filament\Widgets\SuratKeluarTable::class,
            ];
        }
        // 🔶 USER BIASA
        return [
            \App\Filament\Widgets\UserStatsOverview::class,
            \App\Filament\Widgets\UserChartPengajuan::class,
            #\App\Filament\Widgets\UserQuickAction::class,
            #\App\Filament\Widgets\UserPengajuanTable::class,
            #\App\Filament\Widgets\UserListBiroTable::class,
            ];
    }

    public function getColumns(): int | array
    {
        return 2;
    }
}