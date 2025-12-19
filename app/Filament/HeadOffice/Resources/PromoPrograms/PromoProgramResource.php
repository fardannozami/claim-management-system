<?php

namespace App\Filament\HeadOffice\Resources\PromoPrograms;

use App\Filament\HeadOffice\Resources\PromoPrograms\Pages\CreatePromoProgram;
use App\Filament\HeadOffice\Resources\PromoPrograms\Pages\EditPromoProgram;
use App\Filament\HeadOffice\Resources\PromoPrograms\Pages\ListPromoPrograms;
use App\Filament\HeadOffice\Resources\PromoPrograms\Schemas\PromoProgramForm;
use App\Filament\HeadOffice\Resources\PromoPrograms\Tables\PromoProgramsTable;
use App\Models\PromoProgram;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PromoProgramResource extends Resource
{
    protected static ?string $model = PromoProgram::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PromoProgramForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PromoProgramsTable::configure($table);
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
            'index' => ListPromoPrograms::route('/'),
            'create' => CreatePromoProgram::route('/create'),
            'edit' => EditPromoProgram::route('/{record}/edit'),
        ];
    }
}
