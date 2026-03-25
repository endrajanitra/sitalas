<?php

namespace App\Filament\Resources\BiroBagians\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class BiroBagianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Relasi Biro & Bagian')
                    ->description('Pilih hubungan antara biro dan bagian')
                    ->schema([

                        Grid::make([
                            'default' => 1,
                            'md' => 2,
                        ])->schema([

                            Select::make('biro_unit_pengolah_id')
                                ->label('Biro')
                                ->relationship(
                                    'biroUnit',
                                    'direktorat',
                                    modifyQueryUsing: fn ($query) =>
                                        $query->where('biro', true)
                                              ->where('active', true)
                                )
                                ->searchable()
                                ->preload()
                                ->placeholder('Pilih Biro')
                                ->required(),

                            Select::make('sub_biro_unit_pengolah_id')
                                ->label('Bagian')
                                ->relationship(
                                    'subBiro',
                                    'direktorat',
                                    modifyQueryUsing: fn ($query) =>
                                        $query->where('sub_biro', true)
                                              ->where('active', true)
                                )
                                ->searchable()
                                ->preload()
                                ->placeholder('Pilih Bagian')
                                ->required(),

                        ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}