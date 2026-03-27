<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Penerima;

class SuratMasukTable extends TableWidget
{
    protected static ?string $heading = 'Surat Masuk Terbaru';

    protected function getTableQuery(): Builder
    {
        return Penerima::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('no_surat'),
            Tables\Columns\TextColumn::make('pengirim'),
            Tables\Columns\TextColumn::make('perihal'),
            Tables\Columns\TextColumn::make('tanggal_terima')
            ->date('d M Y')
            ->sortable(),
        ];
    }
}