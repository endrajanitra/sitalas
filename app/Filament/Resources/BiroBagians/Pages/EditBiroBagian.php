<?php

namespace App\Filament\Resources\BiroBagians\Pages;

use App\Filament\Resources\BiroBagians\BiroBagianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBiroBagian extends EditRecord
{
    protected static string $resource = BiroBagianResource::class;

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
