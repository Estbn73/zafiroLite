<?php

namespace App\Filament\Resources\CorreoResource\Pages;

use App\Filament\Resources\CorreoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCorreos extends ListRecords
{
    protected static string $resource = CorreoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
