<?php

namespace App\Filament\Resources\BiroBagians\Pages;

use App\Filament\Resources\BiroBagians\BiroBagianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBiroBagians extends ListRecords
{
    protected static string $resource = BiroBagianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
