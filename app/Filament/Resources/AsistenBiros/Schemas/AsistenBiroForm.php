<?php

namespace App\Filament\Resources\AsistenBiros\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AsistenBiroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('asisten_unit_pengolah_id')
                    ->label('Asisten')
                    ->relationship(
                        'asistenUnit',
                        'direktorat',
                        modifyQueryUsing: fn ($query) =>
                            $query->where('asisten', true) ->where('active', true)
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('biro_unit_pengolah_id')
                    ->label('Biro')
                    ->relationship(
                        'biroUnit',
                        'direktorat',
                        modifyQueryUsing: fn ($query) =>
                            $query->where('biro', true) ->where('active', true)
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
