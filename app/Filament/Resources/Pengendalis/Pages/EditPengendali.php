<?php

namespace App\Filament\Resources\Pengendalis\Pages;

use App\Filament\Resources\Pengendalis\PengendaliResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPengendali extends EditRecord
{
    protected static string $resource = PengendaliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
