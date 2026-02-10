<?php

namespace App\Filament\Resources\TypeSurats\Pages;

use App\Filament\Resources\TypeSurats\TypeSuratResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTypeSurat extends EditRecord
{
    protected static string $resource = TypeSuratResource::class;

    protected function getRedirectUrl(): ?string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
