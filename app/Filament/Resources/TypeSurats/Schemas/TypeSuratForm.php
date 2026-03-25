<?php

namespace App\Filament\Resources\TypeSurats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class TypeSuratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Type Surat')
                    ->description('Pengaturan jenis dan kode agenda surat')
                    ->schema([

                        Grid::make([
                            'default' => 1,
                            'md' => 2,
                        ])->schema([

                            TextInput::make('type_surat')
                                ->label('Type Surat')
                                ->placeholder('Contoh: Surat Masuk / Surat Keluar')
                                ->required()
                                ->maxLength(100),

                            TextInput::make('kode_no_agenda')
                                ->label('Kode No Agenda')
                                ->placeholder('Contoh: SM / SK')
                                ->required()
                                ->maxLength(50),

                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}