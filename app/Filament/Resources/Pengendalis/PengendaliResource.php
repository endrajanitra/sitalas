<?php

namespace App\Filament\Resources\Pengendalis;

use App\Filament\Resources\Pengendalis\Pages\CreatePengendali;
use App\Filament\Resources\Pengendalis\Pages\EditPengendali;
use App\Filament\Resources\Pengendalis\Pages\ListPengendalis;
use App\Filament\Resources\Pengendalis\Pages\ViewPengendali;
use App\Filament\Resources\Pengendalis\Schemas\PengendaliForm;
use App\Filament\Resources\Pengendalis\Schemas\PengendaliInfolist;
use App\Filament\Resources\Pengendalis\Tables\PengendalisTable;
use App\Models\Pengendali;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PengendaliResource extends Resource
{
    protected static ?string $model = Pengendali::class;
    protected static string | UnitEnum | null $navigationGroup = 'Surat Masuk';
    protected static ?string $navigationLabel = 'Pengendali';

    #protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'pengendali';

    public static function form(Schema $schema): Schema
    {
        return PengendaliForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PengendaliInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PengendalisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPengendalis::route('/'),
            'create' => CreatePengendali::route('/create'),
            'view' => ViewPengendali::route('/{record}'),
            'edit' => EditPengendali::route('/{record}/edit'),
        ];
    }
}
