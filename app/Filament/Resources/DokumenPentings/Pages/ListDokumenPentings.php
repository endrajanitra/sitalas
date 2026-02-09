<?php

namespace App\Filament\Resources\DokumenPentings\Pages;

use App\Filament\Resources\DokumenPentings\DokumenPentingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDokumenPentings extends ListRecords
{
    protected static string $resource = DokumenPentingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
