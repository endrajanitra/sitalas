<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget;
use Filament\Tables;
use App\Models\ListBiro;
use Illuminate\Database\Eloquent\Builder;

class UserListBiroTable extends TableWidget
{
    protected static ?string $heading = 'Data yang Sudah Masuk Biro';

    public static function canView(): bool
    {
        return auth()->user()?->type === 'user';
    }

    protected function getTableQuery(): Builder
    {
        return ListBiro::query()
            ->whereHas('tambahSuratKeluar', fn ($q) =>
                $q->whereBelongsTo(auth()->user())
            )
            ->latest()
            ->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('no_surat'),
            Tables\Columns\TextColumn::make('kepada'),
            Tables\Columns\TextColumn::make('perihal'),
            Tables\Columns\TextColumn::make('tanggal_surat')->date(),
        ];
    }
}