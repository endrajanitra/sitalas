<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use App\Models\TambahSuratKeluar;

class UserPengajuanTable extends TableWidget
{
    protected static ?string $heading = 'Pengajuan Terbaru';

    public static function canView(): bool
    {
        return auth()->user()?->type === 'user';
    }

    protected function getTableQuery(): Builder
    {
        return TambahSuratKeluar::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('no_surat')->label('No Surat'),
            Tables\Columns\TextColumn::make('perihal'),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->colors([
                    'warning' => 'pending',
                    'success' => 'diterima',
                    'danger' => 'ditolak',
                ]),
            Tables\Columns\TextColumn::make('tanggal_surat')->date(),
        ];
    }
}