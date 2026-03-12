<?php

namespace App\Filament\Resources\SopdPengajuans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;

class SopdPengajuanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('tanggal_surat')
                    ->required(),
                Textarea::make('perihal')
                    ->required()
                    ->columnSpanFull(),
                Select::make('sifat_surat_id')
                    ->label('Sifat Surat')
                    ->relationship('Sifat', 'sifat_surat')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('kepada')
                    ->required(),
                TextInput::make('kontak_person')
                    ->required(),
                Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('upload_file')
                    ->required(),
            ]);
    }
}
