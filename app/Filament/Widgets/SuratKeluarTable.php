<?php

namespace App\Filament\Widgets;

use Filament\Widgets\TableWidget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use App\Models\TambahSuratKeluar;

class SuratKeluarTable extends TableWidget
{
    protected static ?string $heading = 'Surat Keluar Terbaru';

    protected function getTableQuery(): Builder
    {
        return TambahSuratKeluar::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('no_surat'),
            Tables\Columns\TextColumn::make('kepada'),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->colors([
                    'warning' => 'pending',
                    'success' => 'approved',
                    'danger' => 'rejected',
                ]),
        ];
    }
}