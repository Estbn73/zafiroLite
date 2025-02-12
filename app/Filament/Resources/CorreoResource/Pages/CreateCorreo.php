<?php

namespace App\Filament\Resources\CorreoResource\Pages;

use App\Filament\Resources\CorreoResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Mail\EnviarCorreo;
use Illuminate\Support\Facades\Mail;

class CreateCorreo extends CreateRecord
{
    protected static string $resource = CorreoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirige a la tabla después de crear
    }

    protected function handleRecordCreation(array $data): Model
    {
        $correo = static::getModel()::create($data);

        // Enviar el correo automáticamente
        Mail::to($correo->destinatario)->send(new EnviarCorreo($correo));

        return $correo;
    }

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()->label('Enviar');
    }

    protected function getCreateAnotherAction(): \Filament\Actions\Action
    {
        return parent::getCreateAnotherAction()->label('Enviarycrearotro');
    }

    


}
