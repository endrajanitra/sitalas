<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget;
use Filament\Tables;
use App\Models\SuratMasuk;
use Illuminate\Database\Eloquent\Builder;

class StaffSuratMasukTable extends TableWidget
{
    protected static ?string $heading = 'Surat Masuk Terbaru';

    public static function canView(): bool
    {
        return auth()->user()?->type === 'staf';
    }

    protected function getTableQuery(): Builder
    {
        return SuratMasuk::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('no_surat'),
            Tables\Columns\TextColumn::make('pengirim'),
            Tables\Columns\TextColumn::make('perihal')->limit(30),

            Tables\Columns\TextColumn::make('unitPengolah.nama')
                ->label('Direktorat'),

            Tables\Columns\TextColumn::make('sifatSurat.nama')
                ->label('Sifat'),

            Tables\Columns\TextColumn::make('tanggal_terima')->date(),
        ];
    }
}