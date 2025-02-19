<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CorreoResource\Pages;
use App\Mail\EnviarCorreo;
use Illuminate\Support\Facades\Mail;
use App\Models\Correo;
use App\Models\EmailTemplate;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Resources\Resource;



class CorreoResource extends Resource
{
    protected static ?string $model = Correo::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function getNavigationGroup(): ?string
    {
        return 'Gestión de Correos';
    }
    public static function getNavigationLabel(): string
    {
        return 'Enviar Correo';
    }

 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('destinatario')
                        ->label('Correo destinatario')
                        ->email()
                        ->required(),

                    TextInput::make('asunto')
                        ->label('Asunto')
                        ->required(),
                ]),

                Select::make('plantilla_id')
                    ->label('Seleccionar una plantilla')
                    ->placeholder('Selecciona una plantilla')
                    ->options(EmailTemplate::pluck('short', 'id'))
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('mensaje', EmailTemplate::find($state)?->template)
                    ),

                RichEditor::make('mensaje')
                    ->label('Mensaje')
                    ->required()
                    ->disableToolbarButtons(['attachFiles']) // Evita subir archivos
                    ->columnSpanFull(),

                FileUpload::make('adjunto')
                    ->label('Adjuntar archivo')
                    ->placeholder('Arrastra  o <font color="#1973E6">Buscar archivo</font>')
                    ->disk('public')
                    ->directory('adjuntos')
                    ->maxSize(10240), // 10MB

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('destinatario')
                    ->label('Destinatario')
                    ->toggleable() // Permite mostrar/ocultar
                    ->searchable(),
                TextColumn::make('asunto')
                    ->label('Asunto')
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Fecha de Envío')
                    ->dateTime()
                    ->toggleable(),

                TextColumn::make('mensaje')
                    ->label('Mensaje')
                    ->limit(50)
                    ->html()
                    ->toggleable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filtro por Destinatario (Correo)
                // Filter::make('destinatario')
                //     ->label('Buscar por correo'),


                // Filter::make('asunto')
                //     ->label('Buscar por asunto'),


                Filter::make('created_at')
                    ->form([

                        DatePicker::make('created_from')->label('Desde'),
                        DatePicker::make('created_until')->label('Hasta'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['created_from'], fn($query) => $query->whereDate('created_at', '>=', $data['created_from']))
                            ->when($data['created_until'], fn($query) => $query->whereDate('created_at', '<=', $data['created_until']));
                    })
                    ->indicateUsing(function (array $data) {
                        if ($data['created_from'] && $data['created_until']) {
                            return 'Filtrando por fechas';
                        }
                        return null;
                    }),

                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')->label('Desde'),
                        DatePicker::make('created_until')->label('Hasta'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['created_from'], fn($query) => $query->whereDate('created_at', '>=', $data['created_from']))
                            ->when($data['created_until'], fn($query) => $query->whereDate('created_at', '<=', $data['created_until']));
                    })
                    ->indicateUsing(function (array $data) {
                        if ($data['created_from'] && $data['created_until']) {
                            return 'Filtrando por fechas';
                        }
                        return null;
                    }),
            ])
            ->searchable()
            ->actions([
                Action::make('enviarCorreo')
                    ->label('Reenviar')
                    ->icon('heroicon-o-paper-airplane')
                    ->action(function ($record) {
                        Mail::to($record->destinatario)->queue(new EnviarCorreo($record));
                    })
                    ->requiresConfirmation()
                    ->color('success'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCorreos::route('/'),
            'create' => Pages\CreateCorreo::route('/create'),
            'edit' => Pages\EditCorreo::route('/{record}/edit'),
        ];
    }

    public static function enviarCorreo($record)
    {
        Mail::to($record->destinatario)->send(new EnviarCorreo($record));
    }
}
