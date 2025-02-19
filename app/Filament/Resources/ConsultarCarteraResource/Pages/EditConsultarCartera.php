<?php

namespace App\Filament\Resources\ConsultarCarteraResource\Pages;

use App\Filament\Resources\ConsultarCarteraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsultarCartera extends EditRecord
{
    protected static string $resource = ConsultarCarteraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
