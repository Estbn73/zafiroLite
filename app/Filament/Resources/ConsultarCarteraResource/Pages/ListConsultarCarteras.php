<?php

namespace App\Filament\Resources\ConsultarCarteraResource\Pages;

use App\Filament\Resources\ConsultarCarteraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsultarCarteras extends ListRecords
{
    protected static string $resource = ConsultarCarteraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
