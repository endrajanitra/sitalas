<?php

namespace App\Filament\Resources\BiroBagians;

use App\Filament\Resources\BiroBagians\Pages\CreateBiroBagian;
use App\Filament\Resources\BiroBagians\Pages\EditBiroBagian;
use App\Filament\Resources\BiroBagians\Pages\ListBiroBagians;
use App\Filament\Resources\BiroBagians\Schemas\BiroBagianForm;
use App\Filament\Resources\BiroBagians\Tables\BiroBagiansTable;
use App\Models\BiroBagian;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Symfony\Component\Translation\StaticMessage;

class BiroBagianResource extends Resource
{
    protected static ?string $model = BiroBagian::class;

    protected static string | UnitEnum | null $navigationGroup = 'Master';

    protected Static ?string $navigationLabel = 'Biro Bagian';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-identification';

    protected static ?string $recordTitleAttribute = 'biro_bagian';

    public static function form(Schema $schema): Schema
    {
        return BiroBagianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BiroBagiansTable::configure($table);
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
            'index' => ListBiroBagians::route('/'),
            'create' => CreateBiroBagian::route('/create'),
            'edit' => EditBiroBagian::route('/{record}/edit'),
        ];
    }
}
