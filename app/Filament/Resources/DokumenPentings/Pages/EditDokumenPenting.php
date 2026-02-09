<?php

namespace App\Filament\Resources\DokumenPentings\Pages;

use App\Filament\Resources\DokumenPentings\DokumenPentingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDokumenPenting extends EditRecord
{
    protected static string $resource = DokumenPentingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
