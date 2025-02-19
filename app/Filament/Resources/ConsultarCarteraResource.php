<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultarCarteraResource\Pages;
use App\Models\ConsultarCartera;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;

class ConsultarCarteraResource extends Resource
{
    protected static ?string $model = ConsultarCartera::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';

    public static function getNavigationGroup(): ?string
    {
        return 'Operaciones';
    }

    public static function getNavigationLabel(): string
    {
        return 'Consultar Cartera';
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dni_number')
                ->toggleable()
                ->label('Cédula'),
                Tables\Columns\TextColumn::make('debtor_name')
                ->toggleable()
                ->label('Nombre Deudor'),
                Tables\Columns\TextColumn::make('codebtor_name')
                ->toggleable()
                ->label('Nombre Cod.'),
                Tables\Columns\TextColumn::make('codebtor_dni_number')
                ->toggleable()
                ->label('Cédula Cod.'),
                Tables\Columns\TextColumn::make('codebtor2_name')
                ->toggleable()
                ->label('Nombre Cod2.'),
                Tables\Columns\TextColumn::make('codebtor2_dni_number')
                ->toggleable()
                ->label('Cédula Cod2.'),
            ])
            ->filters([
                Filter::make('search')
                    ->form([
                        TextInput::make('dni_number')
                        ->label('Cédula'),
                        TextInput::make('debtor_name')
                        ->label('Nombre Deudor'),
                        TextInput::make('codebtor_name')
                        ->label('Nombre Cod.'),
                        TextInput::make('codebtor_dni_number')
                        ->label('Cédula Cod.'),
                        TextInput::make('codebtor2_name')
                        ->label('Nombre Cod2.'),
                        TextInput::make('codebtor2_dni_number')
                        ->label('Cédula Cod2.'),
                    ])
                    ->query(function ($query, array $data) {
                        $hasFilters = false;
                        $query->where(function ($q) use ($data, &$hasFilters) {
                            foreach ($data as $key => $value) {
                                if (!empty($value)) {
                                    $q->orWhere($key, 'like', "%{$value}%");
                                    $hasFilters = true;
                                }
                            }
                        });

                        // Si no se ha ingresado ningún filtro, devuelve una consulta vacía.
                        if (!$hasFilters) {
                            $query->whereRaw('1 = 0');
                        }
                    }),
            ])
            ->actions([])
            ->bulkActions([])
            ->emptyStateIcon('heroicon-o-magnifying-glass')
            ->emptyStateHeading('No hay datos que mostrar')
            ->emptyStateDescription('Ejecuta una búsqueda para ver los resultados');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConsultarCarteras::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false; // 🔹 Esto deshabilita la opción de crear desde la vista
    }
}
