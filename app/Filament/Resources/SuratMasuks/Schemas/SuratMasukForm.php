<?php

namespace App\Filament\Resources\SuratMasuks\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use App\Models\KodeSurat;

class SuratMasukForm
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

                    Grid::make(1)->schema([

                        Section::make('Informasi Surat')
                            ->description('Data utama surat masuk')
                            ->schema([
                                Grid::make(2)->schema([

                                    TextInput::make('no_surat')
                                        ->label('Nomor Surat')
                                        ->required()
                                        ->columnSpanFull(),

                                    DatePicker::make('tanggal_terima')
                                        ->label('Tanggal Terima')
                                        ->required(),

                                    DatePicker::make('tanggal_surat')
                                        ->label('Tanggal Surat')
                                        ->required(),

                                    TextInput::make('no_urut')
                                        ->label('No Urut')
                                        ->numeric()
                                        ->required(),

                                    TextInput::make('banyak_surat')
                                        ->label('Jumlah Surat')
                                        ->numeric()
                                        ->required(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),

                        Section::make('Isi Surat')
                            ->schema([

                                TextInput::make('pengirim')
                                    ->label('Pengirim')
                                    ->required(),

                                TextInput::make('perihal')
                                    ->label('Perihal')
                                    ->required(),

                                Textarea::make('ringkasan_pokok')
                                    ->label('Ringkasan Pokok')
                                    ->rows(3)
                                    ->required(),

                                Textarea::make('catatan')
                                    ->label('Catatan')
                                    ->rows(3)
                                    ->required(),
                            ])
                            ->extraAttributes(['class' => 'h-full']),
                    ]),

                    Grid::make(1)->schema([

                        Section::make('Tujuan & Klasifikasi')
                            ->schema([
                                Grid::make(2)->schema([

                                    Select::make('direktorat_id')
                                        ->label('Tujuan')
                                        ->relationship('unitPengolah', 'direktorat')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->columnSpanFull(),

                                    Select::make('kode_id')
                                        ->label('Kode Surat')
                                        ->relationship('kodeSurat', 'kode')
                                        ->getOptionLabelFromRecordUsing(fn (KodeSurat $record) =>
                                            $record->kode . ' - ' . $record->index
                                        )
                                        ->searchable()
                                        ->preload()
                                        ->required(),

                                    Select::make('sifat_surat_id')
                                        ->label('Sifat Surat')
                                        ->relationship('sifatSurat', 'sifat_surat')
                                        ->searchable()
                                        ->preload()
                                        ->required(),

                                    TextInput::make('kontak_person')
                                        ->label('Kontak Person')
                                        ->tel()
                                        ->required(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),

                        Section::make('Lampiran')
                            ->schema([
                                FileUpload::make('upload_file')
                                    ->label('Upload File')
                                    ->required(),
                            ])
                            ->extraAttributes(['class' => 'h-full']),
                    ]),
                ]),
            ]);
    }
}