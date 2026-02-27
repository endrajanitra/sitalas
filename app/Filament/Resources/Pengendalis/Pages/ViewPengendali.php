<?php

namespace App\Filament\Resources\Pengendalis\Pages;

use App\Filament\Resources\Pengendalis\PengendaliResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPengendali extends ViewRecord
{
    protected static string $resource = PengendaliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
