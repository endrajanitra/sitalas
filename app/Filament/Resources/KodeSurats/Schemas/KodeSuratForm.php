<?php

namespace App\Filament\Resources\KodeSurats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class KodeSuratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Kode Surat')
                    ->description('Isi kode dan klasifikasi surat')
                    ->schema([
                        Grid::make([
                            'default' => 1,
                            'md' => 2,
                            'xl' => 3,
                        ])->schema([

                            TextInput::make('kode')
                                ->label('Kode Surat')
                                ->placeholder('Contoh: 001')
                                ->required()
                                ->maxLength(50),

                            TextInput::make('index')
                                ->label('Index Surat')
                                ->placeholder('Contoh: A.1')
                                ->required()
                                ->maxLength(50),

                            TextInput::make('tahun')
                                ->label('Tahun')
                                ->numeric()
                                ->placeholder('Contoh: 2026')
                                ->required()
                                ->minValue(2000)
                                ->maxValue(date('Y') + 1),

                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}