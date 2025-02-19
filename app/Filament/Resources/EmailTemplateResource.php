<?php

namespace App\Filament\Resources;

use App\Models\EmailTemplate;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\EmailTemplateResource\Pages\ListEmailTemplates;
use App\Filament\Resources\EmailTemplateResource\Pages\CreateEmailTemplate;
use App\Filament\Resources\EmailTemplateResource\Pages\EditEmailTemplate;


class EmailTemplateResource extends Resource
{
    protected static ?string $model = EmailTemplate::class;
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';
    public static function getNavigationGroup(): ?string
    {
        return 'Gestión de Correos';
    }
    public static function getNavigationLabel(): string
    {
        return 'Crear Plantilla';
    }

    public static function getModelLabel(): string
    {
        return 'Plantilla';
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('short')
                    ->label('Descripción')
                    ->required()
                    ->maxLength(45),

                RichEditor::make('template')
                    ->label('Cuerpo del mensaje')
                    ->required(),
            ])
            ->columns(1);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('short')
                    ->label('Descripción')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                // Agrega filtros aquí si es necesario
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmailTemplates::route('/'),
            'create' => CreateEmailTemplate::route('/create'),
            'edit' => EditEmailTemplate::route('/{record}/edit'),
        ];
    }
}
