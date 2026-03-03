<?php

namespace App\Filament\Resources\Pengarahs\Schemas;
use App\Models\KodeSurat;
use App\Models\Penerima;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PengarahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                /*DatePicker::make('tanggal_terima')
                    ->required(),
                DatePicker::make('tanggal_surat')
                    ->required(),
                TextInput::make('no_urut')
                    ->required()
                    ->numeric(),
                
                TextInput::make('banyak_surat')
                    ->required()
                    ->numeric(),*/
                Select::make('direktorat_id')
                    ->label('Unit Pengolah')
                    ->relationship('unitPengolah', 'direktorat')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('kode_id')
                    ->label('Kode Surat')
                    ->relationship('kodeSurat', 'kode')
                    ->getOptionLabelFromRecordUsing(fn (KodeSurat $record) =>
                        $record->kode . ' - ' . $record->index
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('no_surat')
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
                /*TextInput::make('kontak_person')
                    ->required(),
                TextInput::make('sifat_surat_id')
                    ->required()
                    ->numeric(),*/
                Textarea::make('ringkasan_poko')
                    ->required()
                    ->columnSpanFull(),
                /*Textarea::make('catatan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('file_upload')
                    ->required(),
                TextInput::make('no_box')
                    ->required(),
                TextInput::make('no_rak')
                    ->required(),*/
            ]);
    }
}
