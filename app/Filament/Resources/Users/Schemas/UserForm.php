<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Pengguna')
                    ->description('Data utama pengguna sistem')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Nama Lengkap')
                                ->placeholder('Masukkan nama lengkap')
                                ->required(),

                            TextInput::make('email')
                                ->label('Alamat Email')
                                ->email()
                                ->placeholder('contoh@email.com')
                                ->required()
                                ->unique(ignoreRecord: true),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('password')
                                ->label('Kata Sandi')
                                ->password()
                                ->placeholder('Isi jika ingin mengubah password')
                                ->required(fn (string $operation): bool => $operation === 'create')
                                ->dehydrated(fn ($state): bool => filled($state)),

                            Select::make('direktorat_id')
                                ->label('Direktorat')
                                ->relationship('unitPengolah', 'direktorat')
                                ->searchable()
                                ->preload()
                                ->placeholder('Pilih direktorat')
                                ->nullable(),
                        ]),
                    ]),

                Section::make('Kontak & Identitas')
                    ->description('Informasi tambahan pengguna')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('no_hp')
                                ->label('Nomor HP')
                                ->tel()
                                ->placeholder('08xxxxxxxxxx')
                                ->maxLength(20),

                            FileUpload::make('file_ttd')
                                ->label('Tanda Tangan')
                                ->directory('ttd')
                                ->image()
                                ->imagePreviewHeight('100')
                                ->maxSize(2048)
                                ->helperText('Upload tanda tangan (max: 2MB)'),
                        ]),
                    ]),

                Section::make('Pengaturan Akun')
                    ->description('Status dan hak akses pengguna')
                    ->schema([
                        Grid::make(3)->schema([
                            Toggle::make('sopd')
                                ->label('User SOPD')
                                ->default(false),

                            Toggle::make('active')
                                ->label('Status Aktif')
                                ->default(true),

                        ]),
                    ]),
            ]);
    }
}