<?php

namespace App\Filament\Resources\CorreoResource\Pages;

use App\Filament\Resources\CorreoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCorreo extends EditRecord
{
    protected static string $resource = CorreoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Eliminar')
        ];
    }

}
