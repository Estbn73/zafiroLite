<?php

namespace App\Filament\Resources\CorreoResource\Pages;

use App\Filament\Resources\CorreoResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Mail\EnviarCorreo;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
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
        return parent::getCreateFormAction()
            ->label('Enviar')
            ->color('success');
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Enviar y crear otro')
            ->color('info');
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Cancelar')
            ->color('danger');
    }

    protected function sendCreatedNotification(): void
{
    Notification::make()
        ->title('Correo enviado')
        ->success()
        ->body('El correo se ha enviado correctamente.')
        ->send();
}
}
