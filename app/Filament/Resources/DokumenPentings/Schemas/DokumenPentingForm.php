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
                    ->label('Tanggal Terima')
                    ->required(),
                DatePicker::make('tgl_surat')
                    ->label('Tanggal Surat')
                    ->required(),
                TextInput::make('no_surat')
                    ->label('No Surat')
                    ->required(),
                TextInput::make('jumlah_sk')
                    ->label('Jumlah Sk')
                    ->numeric(),
                Select::make('direktorat_id')
                    ->label('Tujuan')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('pengirim')
                    ->label('Pengirim'),
                TextInput::make('perihal')
                    ->required(),
                TextInput::make('kontak_person')
                    ->label('Kontak Person'),
                Textarea::make('catatan')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('upload_file')
                    ->label('Upload File')
                    ->directory('upload_file')
                    ->image()
                    ->maxSize(2048),
                Toggle::make('kirim_ke_tujuan')
                    ->label('Kirim Ke Tujuan'),
            ]);
    }
}
