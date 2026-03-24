<?php

namespace App\Filament\Resources\UnitPengolahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class UnitPengolahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Utama')
                    ->description('Isi data utama unit pengolah')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('direktorat')
                                ->label('Direktorat')
                                ->placeholder('Masukkan nama direktorat')
                                ->required(),

                            TextInput::make('kode_surat')
                                ->label('Kode Surat')
                                ->placeholder('Contoh: 001/ABC'),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('urutan')
                                ->label('Urutan')
                                ->numeric()
                                ->default(0)
                                ->helperText('Digunakan untuk pengurutan data'),

                            Toggle::make('active')
                                ->label('Status Aktif')
                                ->default(true),
                        ]),
                    ]),

                Section::make('Kontak')
                    ->description('Nomor yang dapat dihubungi')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('no_hp_1')
                                ->label('No HP 1')
                                ->tel(),

                            TextInput::make('no_hp_2')
                                ->label('No HP 2')
                                ->tel(),

                            TextInput::make('no_hp_3')
                                ->label('No HP 3')
                                ->tel(),

                            TextInput::make('no_hp_4')
                                ->label('No HP 4')
                                ->tel(),
                        ]),
                    ]),

                Section::make('Pengaturan & Role')
                    ->description('Pengaturan hak dan kategori')
                    ->schema([
                        Grid::make(3)->schema([
                            Toggle::make('bold')->label('Bold'),
                            Toggle::make('all_data')->label('Semua Data'),
                            Toggle::make('sekretaris')->label('Sekretaris'),
                            Toggle::make('asisten')->label('Asisten'),
                            Toggle::make('biro')->label('Biro'),
                            Toggle::make('sub_biro')->label('Sub Biro'),
                        ]),
                    ]),
            ]);
    }
}