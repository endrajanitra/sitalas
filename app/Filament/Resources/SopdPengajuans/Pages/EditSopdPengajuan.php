<?php

namespace App\Filament\Resources\SopdPengajuans\Pages;

use App\Filament\Resources\SopdPengajuans\SopdPengajuanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Facades\Filament;
use Filament\Resources\Pages\EditRecord;

class EditSopdPengajuan extends EditRecord
{
    protected static string $resource = SopdPengajuanResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['direktorat_id'] = Filament::auth()->user()->direktorat_id;
        
        return ($data);
    }

    public static function canEdit(\Illuminate\Database\Eloquent\Model $record): bool
    {
        return ! $record->is_requested;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
