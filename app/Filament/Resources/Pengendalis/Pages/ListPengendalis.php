<?php

namespace App\Filament\Resources\Pengendalis\Pages;

use App\Filament\Resources\Pengendalis\PengendaliResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPengendalis extends ListRecords
{
    protected static string $resource = PengendaliResource::class;

    /*protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }*/
}
