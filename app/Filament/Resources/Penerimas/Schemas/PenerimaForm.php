<?php

namespace App\Filament\Resources\Penerimas\Schemas;

use App\Models\Penerima;
use App\Models\KodeSurat;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PenerimaForm
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

                                    TextInput::make('no_surat')
                                        ->label('No Surat')
                                        ->required(),

                                    TextInput::make('banyak_surat')
                                        ->label('Jumlah Surat')
                                        ->numeric()
                                        ->required(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),

                        Section::make('Lokasi Arsip')
                            ->schema([
                                Grid::make(2)->schema([

                                    TextInput::make('no_box')
                                        ->label('No Box')
                                        ->required(),

                                    TextInput::make('no_rak')
                                        ->label('No Rak')
                                        ->required(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),
                    ]),

                    // 🟣 KOLOM KANAN
                    Grid::make(1)->schema([

                        Section::make('Detail Surat')
                            ->schema([
                                Grid::make(2)->schema([

                                    Select::make('direktorat_id')
                                        ->label('Unit Pengolah')
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

                                    TextInput::make('pengirim')
                                        ->label('Pengirim')
                                        ->required()
                                        ->datalist(
                                            Penerima::query()
                                                ->select('pengirim')
                                                ->distinct()
                                                ->pluck('pengirim')
                                                ->toArray()
                                        ),

                                    TextInput::make('perihal')
                                        ->label('Perihal')
                                        ->required()
                                        ->datalist(
                                            Penerima::query()
                                                ->select('perihal')
                                                ->distinct()
                                                ->pluck('perihal')
                                                ->toArray()
                                        ),

                                    TextInput::make('kontak_person')
                                        ->label('Kontak Person')
                                        ->required(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),

                        Section::make('Isi & Lampiran')
                            ->schema([
                                Textarea::make('ringkasan_poko')
                                    ->label('Ringkasan Pokok')
                                    ->rows(3)
                                    ->required(),

                                Textarea::make('catatan')
                                    ->label('Catatan')
                                    ->rows(3)
                                    ->required(),

                                FileUpload::make('file_upload')
                                    ->label('Upload File')
                                    ->required(),
                            ])
                            ->extraAttributes(['class' => 'h-full']),
                    ]),
                ]),
            ]);
    }
}