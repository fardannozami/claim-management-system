<?php

namespace App\Filament\HeadOffice\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sku')
                    ->label('SKU')
                    ->unique()
                    ->required(),
                TextInput::make('name')
                    ->required(),
            ]);
    }
}
