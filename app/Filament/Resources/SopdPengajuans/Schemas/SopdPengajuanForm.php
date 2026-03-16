<?php

namespace App\Filament\Resources\SopdPengajuans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class SopdPengajuanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                DatePicker::make('tanggal_surat')
                    ->required(),

                Textarea::make('perihal')
                    ->required(),

                Select::make('sifat_surat_id')
                    ->label('Sifat Surat')
                    ->relationship('Sifat', 'sifat_surat')
                    ->searchable()
                    ->preload(),

                TextInput::make('kepada')
                    ->label('Kepada')
                    ->required(),

                TextInput::make('kontak_person')
                    ->label('No HP')
                    ->required(),

                Textarea::make('keterangan')
                    ->label('Note'),

                FileUpload::make('upload_file')
                    ->label('Upload File'),

            ]);
    }
}