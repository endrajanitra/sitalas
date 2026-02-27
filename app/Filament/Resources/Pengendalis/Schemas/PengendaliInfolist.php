<?php

namespace App\Filament\Resources\Pengendalis\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PengendaliInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('penerima_id')
                    ->numeric(),
                TextEntry::make('tanggal_terima')
                    ->date(),
                TextEntry::make('tanggal_surat')
                    ->date(),
                TextEntry::make('no_urut')
                    ->numeric(),
                TextEntry::make('no_surat'),
                TextEntry::make('banyak_surat')
                    ->numeric(),
                TextEntry::make('direktorat_id')
                    ->numeric(),
                TextEntry::make('kode_id')
                    ->numeric(),
                TextEntry::make('pengirim'),
                TextEntry::make('perihal'),
                TextEntry::make('kontak_person'),
                TextEntry::make('sifat_surat_id')
                    ->numeric(),
                TextEntry::make('ringkasan_poko')
                    ->columnSpanFull(),
                TextEntry::make('catatan')
                    ->columnSpanFull(),
                TextEntry::make('file_upload'),
                TextEntry::make('no_box'),
                TextEntry::make('no_rak'),
                TextEntry::make('status'),
                TextEntry::make('dikirim_pada')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('pengarah_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
