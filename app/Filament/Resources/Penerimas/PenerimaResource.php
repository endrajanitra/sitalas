<?php

namespace App\Filament\Resources\Penerimas;

use App\Filament\Resources\Penerimas\Pages\CreatePenerima;
use App\Filament\Resources\Penerimas\Pages\EditPenerima;
use App\Filament\Resources\Penerimas\Pages\ListPenerimas;
use App\Filament\Resources\Penerimas\Schemas\PenerimaForm;
use App\Filament\Resources\Penerimas\Tables\PenerimasTable;
use App\Models\Penerima;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class PenerimaResource extends Resource
{
    protected static ?string $model = Penerima::class;

    protected static string | UnitEnum | null $navigationGroup = 'Surat Masuk';

    protected static ?string $navigationLabel = 'Penerima';

    #protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'penerima';

    public static function form(Schema $schema): Schema
    {
        return PenerimaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenerimasTable::configure($table);
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
            'index' => ListPenerimas::route('/'),
            'create' => CreatePenerima::route('/create'),
            'edit' => EditPenerima::route('/{record}/edit'),
        ];
    }
}
