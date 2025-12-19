<?php

namespace App\Filament\HeadOffice\Resources\PromoPrograms\Pages;

use App\Filament\HeadOffice\Resources\PromoPrograms\PromoProgramResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPromoProgram extends EditRecord
{
    protected static string $resource = PromoProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
