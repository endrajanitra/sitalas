<?php

namespace App\Filament\Resources\SopdApproves\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SopdApprovesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),
                TextColumn::make('unitPengolah.direktorat')
                    ->label('Unit Pegolah')
                    ->sortable(),
                TextColumn::make('Kode.kode')
                    ->label('Kode Surat')
                    ->sortable(),
                TextColumn::make('perihal')
                    ->label('Perihal')
                    ->searchable(),
                TextColumn::make('kepada')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('kontak_person')
                    ->label('No Hp')
                    ->searchable(),
                TextColumn::make('upload_file')
                    ->searchable(),
                TextColumn::make('Klasifikasi.klasifikasi')
                    ->label('Klasifikasi')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
