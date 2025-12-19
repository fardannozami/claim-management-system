<?php

namespace App\Filament\HeadOffice\Resources\PromoPrograms\Pages;

use App\Filament\HeadOffice\Resources\PromoPrograms\PromoProgramResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPromoPrograms extends ListRecords
{
    protected static string $resource = PromoProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
