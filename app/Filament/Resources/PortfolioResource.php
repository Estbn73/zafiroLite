<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use App\Models\Portfolio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use App\Filament\Resources\PortfolioResource\Pages;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Tabs;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    public static function getNavigationGroup(): ?string
    {
        return 'Operaciones';
    }

    public static function getNavigationLabel(): string
    {
        return 'Portfolios';
    }

    public static function form(Forms\Form $form): Forms\Form
    {

        return $form
            ->schema([
                    Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tabs\Tab::make('Titular')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Group::make([
                                            Section::make('Datos generales')
                                                ->schema([
                                                    TextInput::make('debtor_name')->label('Nombre titular')->required(),
                                                    TextInput::make('dni_number')->label('Cédula titular')->required(),
                                                    TextInput::make('discount')->label('Foco'),
                                                    TextInput::make('health_entity')->label('Entidad de salud'),
                                                ]),
                
                                            Section::make('Teléfonos')
                                                ->schema([
                                                    TextInput::make('debtor_phone_number1')->label('Celular'),
                                                    TextInput::make('debtor_phone_number2')->label('Teléfono 1'),
                                                    TextInput::make('debtor_phone_number3')->label('Teléfono 2'),
                                                    TextInput::make('debtor_phone_number4')->label('Teléfono 3'),
                                                    Actions::make([
                                                        Action::make('whatsapp_titular')
                                                            ->color('success')
                                                            ->label('Enviar WhatsApp')
                                                            ->icon('heroicon-o-chat-bubble-oval-left-ellipsis')
                                                            ->url(fn ($record) => 'https://wa.me/57' . $record->debtor_phone_number1 . '', true)
                                                            ->visible(fn ($record) => !empty($record->debtor_phone_number1)),
                                                    ]),
                                                ]),
                                        ]),
                
                                        Group::make([
                                            Section::make('Correos')
                                                ->schema([
                                                    TextInput::make('debtor_email1')->label('Email 1'),
                                                    TextInput::make('debtor_email2')->label('Email 2'),
                                                    TextInput::make('debtor_email3')->label('Email 3'),
                                                ]),
                
                                            Section::make('Datos de gestión')
                                                ->schema([
                                                    Select::make('status_id')->label('Estado')->options([
                                                        'CONTACTADO' => 'Contactado',
                                                        'NO CONTACTO' => 'No Contacto',
                                                    ])->required(),
                                                    TextInput::make('last_management_type_id')->label('Última gestión'),
                                                    TextInput::make('agent_id')->label('Agente encargado'),
                                                    TextInput::make('followup_date')->label('Fecha de seguimiento')->type('date'),
                                                ]),
                                        ]),
                                    ]),
                            ]),
                
                        Tabs\Tab::make('Codeudor 1')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        Group::make([
                                            Section::make('Datos generales')
                                                ->schema([
                                                    TextInput::make('codebtor_name')->label('Nombre Deudor')->required(),
                                                    TextInput::make('codebtor_dni_number')->label('Cédula Deudor')->required(),
                                                ]),
                
                                            Section::make('Teléfonos')
                                                ->schema([
                                                    TextInput::make('codebtor_phone_number1')->label('Celular'),
                                                    TextInput::make('codebtor_phone_number2')->label('Teléfono 1'),
                                                    TextInput::make('codebtor_phone_number3')->label('Teléfono 2'),
                                                    Actions::make([
                                                        Action::make('whatsapp_codeudor1')
                                                            ->color('success')
                                                            ->label('Enviar WhatsApp')
                                                            ->icon('heroicon-o-chat-bubble-oval-left-ellipsis')
                                                            ->url(fn ($record) => 'https://wa.me/57' . $record->codebtor_phone_number1 . '', true)
                                                            ->visible(fn ($record) => !empty($record->debtor_phone_number1)),
                                                    ]),
                                                ]),
                                        ]),
                
                                        Group::make([
                                            Section::make('Correos')
                                                ->schema([
                                                    TextInput::make('codebtor_email1')->label('Email 1'),
                                                    TextInput::make('codebtor_email2')->label('Email 2'),
                                                    TextInput::make('codebtor_email3')->label('Email 3'),
                                                ]),
                
                                            Section::make('Dirección')
                                                ->schema([
                                                    TextInput::make('codebtor_address')->label('Dirección'),
                                                    TextInput::make('codebtor_neightborhood')->label('Barrio'),
                                                ]),
                                        ]),
                                    ]),
                            ]),
                
                        Tabs\Tab::make('Codeudor 2')
                            ->schema([
                                Grid    ::make(2)
                                    ->schema([
                                        Group::make([
                                            Section::make('Datos generales')
                                                ->schema([
                                                    TextInput::make('codebtor2_name')->label('Nombre Deudor 2'),
                                                    TextInput::make('codebtor2_dni_number')->label('Cédula Deudor 2'),
                                                ]),
                
                                            Section::make('Teléfonos')
                                                ->schema([
                                                    TextInput::make('codebtor2_phone_number1')->label('Celular'),
                                                    TextInput::make('codebtor2_phone_number2')->label('Teléfono 1'),
                                                    TextInput::make('codebtor2_phone_number3')->label('Teléfono 2'),
                                                    Actions::make([
                                                        Action::make('whatsapp_codeudor2')
                                                            ->color('success')
                                                            ->label('Enviar WhatsApp')
                                                            ->icon('heroicon-o-chat-bubble-oval-left-ellipsis')
                                                            ->url(fn ($record) => 'https://wa.me/57' . $record->codebtor2_phone_number1 . '', true)
                                                            ->visible(fn ($record) => !empty($record->debtor_phone_number1)),
                                                    ]),
                                                ]),
                                        ]),
                
                                        Group::make([
                                            Section::make('Correos')
                                                ->schema([
                                                    TextInput::make('codebtor2_email1')->label('Email 1'),
                                                    TextInput::make('codebtor2_email2')->label('Email 2'),
                                                    TextInput::make('codebtor2_email3')->label('Email 3'),
                                                ]),
                
                                            Section::make('Dirección')
                                                ->schema([
                                                    TextInput::make('codebtor2_address')->label('Dirección'),
                                                    TextInput::make('codebtor2_neightborhood')->label('Barrio'),
                                                ]),
                                        ]),
                                    ]),
                            ]),
                    ])
                ]);
    }


    // public static function table(Tables\Table $table): Tables\Table
    // {
    //     return $table
    //         ->columns([
    //             Tables\Columns\TextColumn::make('nombre_titular')->label('Nombre titular')->searchable(),
    //             Tables\Columns\TextColumn::make('cedula_titular')->label('Cédula titular')->searchable(),
    //             Tables\Columns\TextColumn::make('estado')->label('Estado'),
    //             Tables\Columns\TextColumn::make('fecha_ultima_gestion')->label('Última gestión')->dateTime(),
    //         ])
    //         ->filters([
    //             // Aquí se pueden agregar filtros personalizados si se requieren
    //         ]);
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
            'edit' => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
