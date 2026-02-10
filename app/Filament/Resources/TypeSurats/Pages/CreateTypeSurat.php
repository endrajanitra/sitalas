<?php

namespace App\Filament\Resources\TypeSurats\Pages;

use App\Filament\Resources\TypeSurats\TypeSuratResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTypeSurat extends CreateRecord
{
    protected static string $resource = TypeSuratResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
