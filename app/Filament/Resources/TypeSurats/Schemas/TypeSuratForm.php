<?php

namespace App\Filament\Resources\TypeSurats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TypeSuratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type_surat')
                    ->required(),
                TextInput::make('kode_no_agenda')
                    ->required(),
            ]);
    }
}
