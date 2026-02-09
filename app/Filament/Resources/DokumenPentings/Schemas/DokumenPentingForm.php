<?php

namespace App\Filament\Resources\DokumenPentings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class DokumenPentingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('tgl_terima')
                    ->required(),
                DatePicker::make('tgl_surat')
                    ->required(),
                TextInput::make('no_surat')
                    ->required(),
                TextInput::make('jumlah_sk')
                    ->required()
                    ->numeric(),
                Select::make('direktorat_id')
                    ->label('Tujuan')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                TextInput::make('pengirim')
                    ->required(),
                TextInput::make('perihal')
                    ->required(),
                TextInput::make('kontak_person')
                    ->required(),
                Textarea::make('catatan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('upload_file')
                    ->label('Upluad File')
                    ->directory('upload_file')
                    ->image()
                    ->maxSize(2048),
                Toggle::make('kirim_ke_tujuan')
                    ->required(),
            ]);
    }
}
