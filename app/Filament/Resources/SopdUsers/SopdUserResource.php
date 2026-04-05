<?php

namespace App\Filament\Resources\SopdUsers;
use App\Filament\Resources\SopdUsers\Pages\CreateSopdUser;
use App\Filament\Resources\SopdUsers\Pages\EditSopdUser;
use App\Filament\Resources\SopdUsers\Pages\ListSopdUsers;
use App\Filament\Resources\SopdUsers\Schemas\SopdUserForm;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;
use Filament\Schemas\Schema;

class SopdUserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string | UnitEnum | null $navigationGroup = 'Surat Keluar';
    protected static ?string $modelLabel = 'Sopd User';
    protected static ?string $pluralModelLabel = 'Sopd User';

    protected static ?string $navigationLabel = 'Sopd User';

    #protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $slug = 'sopd-users';

    public static function form(Schema $schema): Schema
    {
        return SopdUserForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SopdUsersTable::configure($table);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('sopd', true)
            ->where('active', true);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSopdUsers::route('/'),
            'create' => CreateSopdUser::route('/create'),
            'edit' => EditSopdUser::route('/{record}/edit'),
        ];
    }
}