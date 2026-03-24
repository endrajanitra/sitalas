<?php

namespace App\Filament\Resources\DokumenPentings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class DokumenPentingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Grid::make([
                    'default' => 1,
                    'xl' => 2,
                ])
                ->columnSpanFull() // 🔥 penting biar full width
                ->schema([

                    // 🔵 KOLOM KIRI
                    Grid::make(1)->schema([

                        Section::make('Informasi Surat')
                            ->description('Data utama surat masuk')
                            ->schema([
                                Grid::make(2)->schema([
                                    DatePicker::make('tgl_terima')
                                        ->label('Tanggal Terima')
                                        ->required(),

                                    DatePicker::make('tgl_surat')
                                        ->label('Tanggal Surat')
                                        ->required(),

                                    TextInput::make('no_surat')
                                        ->label('Nomor Surat')
                                        ->required()
                                        ->columnSpanFull(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),

                        Section::make('Kontak & Catatan')
                            ->schema([
                                TextInput::make('kontak_person')
                                    ->label('Kontak Person')
                                    ->tel(),

                                Textarea::make('catatan')
                                    ->label('Catatan')
                                    ->rows(3)
                                    ->required(),
                            ])
                            ->extraAttributes(['class' => 'h-full']),
                    ]),

                    // 🟣 KOLOM KANAN
                    Grid::make(1)->schema([

                        Section::make('Detail Dokumen')
                            ->schema([
                                Grid::make(2)->schema([
                                    Select::make('direktorat_id')
                                        ->label('Tujuan')
                                        ->relationship('unitPengolah', 'direktorat')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->columnSpanFull(),

                                    TextInput::make('pengirim')
                                        ->label('Pengirim'),

                                    TextInput::make('jumlah_sk')
                                        ->label('Jumlah SK')
                                        ->numeric(),

                                    TextInput::make('perihal')
                                        ->label('Perihal')
                                        ->required()
                                        ->columnSpanFull(),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),

                        Section::make('Lampiran & Pengaturan')
                            ->schema([
                                Grid::make(2)->schema([
                                    FileUpload::make('upload_file')
                                        ->label('Upload File')
                                        ->directory('upload_file')
                                        ->maxSize(2048),

                                    Toggle::make('kirim_ke_tujuan')
                                        ->label('Kirim ke Tujuan')
                                        ->inline(false),
                                ]),
                            ])
                            ->extraAttributes(['class' => 'h-full']),
                    ]),
                ]),
            ]);
    }
}