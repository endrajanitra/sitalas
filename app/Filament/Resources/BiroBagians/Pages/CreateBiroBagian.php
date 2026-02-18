<?php

namespace App\Filament\Resources\BiroBagians\Pages;

use App\Filament\Resources\BiroBagians\BiroBagianResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBiroBagian extends CreateRecord
{
    protected static string $resource = BiroBagianResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
