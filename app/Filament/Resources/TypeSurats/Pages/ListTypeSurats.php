<?php

namespace App\Filament\Resources\TypeSurats\Pages;

use App\Filament\Resources\TypeSurats\TypeSuratResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTypeSurats extends ListRecords
{
    protected static string $resource = TypeSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
