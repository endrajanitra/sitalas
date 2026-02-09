<?php

namespace App\Filament\Resources\DokumenPentings\Pages;

use App\Filament\Resources\DokumenPentings\DokumenPentingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDokumenPenting extends CreateRecord
{
    protected static string $resource = DokumenPentingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
