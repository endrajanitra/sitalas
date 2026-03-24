<?php

namespace App\Filament\Resources\Proposals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ProposalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Grid::make([
                    'default' => 1,
                    'xl' => 2,
                ])
                ->columnSpanFull()
                ->schema([

                    // 🔵 KOLOM KIRI
                    Grid::make(1)->schema([

                        Section::make('Informasi Proposal')
                            ->description('Data utama proposal')
                            ->schema([
                                Grid::make(2)->schema([

                                    DatePicker::make('tanggal')
                                        ->label('Tanggal')
                                        ->required(),

                                    TextInput::make('no_reg')
                                        ->label('Nomor Registrasi')
                                        ->required(),

                                    Select::make('direktorat_id')
                                        ->label('Unit Pengolah')
                                        ->relationship('unitPengolah', 'direktorat')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->columnSpanFull(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),
                    ]),

                    // 🟣 KOLOM KANAN
                    Grid::make(1)->schema([

                        Section::make('Detail Proposal')
                            ->description('Informasi tambahan proposal')
                            ->schema([
                                Grid::make(2)->schema([

                                    TextInput::make('pengirim')
                                        ->label('Pengirim')
                                        ->required(),

                                    TextInput::make('perihal')
                                        ->label('Perihal')
                                        ->placeholder('Opsional'),

                                    Textarea::make('alamat')
                                        ->label('Alamat')
                                        ->rows(3)
                                        ->columnSpanFull(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),
                    ]),
                ]),
            ]);
    }
}