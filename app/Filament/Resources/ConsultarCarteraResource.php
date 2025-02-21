<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultarCarteraResource\Pages;
use App\Models\ConsultarCartera;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\Action;

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
            //DATOS DE LA CARTERA O TABLA
            ->columns([
                Tables\Columns\TextColumn::make('id')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('ID'),
                Tables\Columns\TextColumn::make('costumer_id')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Cliente'),
                Tables\Columns\TextColumn::make('agent_id')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Agente'),
                Tables\Columns\TextColumn::make('status_id')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Estado'),
                Tables\Columns\TextColumn::make('next_task')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tarea'),
                Tables\Columns\TextColumn::make('last_management_type_id')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tipificación'),
                Tables\Columns\TextColumn::make('discount')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Foco'),
                Tables\Columns\TextColumn::make('dni_number')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Cédula Deudor'),
                Tables\Columns\TextColumn::make('debtor_address')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Dirección'),
                Tables\Columns\TextColumn::make('debtor_city')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Ciudad Deudor'),
                Tables\Columns\TextColumn::make('debtor_zip_code')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Código postal'),
                Tables\Columns\TextColumn::make('debtor_neighborhood')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Barrio'),
                Tables\Columns\TextColumn::make('company_name')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Empresa'),
                Tables\Columns\TextColumn::make('company_address')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Dirección empresa'),
                Tables\Columns\TextColumn::make('debtor_phone_number1')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Celular'),
                Tables\Columns\TextColumn::make('debtor_phone_number2')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tel 2'),
                Tables\Columns\TextColumn::make('debtor_phone_number3')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tel 3'),
                Tables\Columns\TextColumn::make('debtor_phone_number4')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tel 4'),
                Tables\Columns\TextColumn::make('debtor_email1')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo 1'),
                Tables\Columns\TextColumn::make('debtor_email2')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo 2'),
                Tables\Columns\TextColumn::make('debtor_email3')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo 3'),
                Tables\Columns\TextColumn::make('total_debt')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Total deuda'),
                Tables\Columns\TextColumn::make('total_debt_with_discount')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Total con descuento'),
                Tables\Columns\TextColumn::make('current_interest')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Interés corriente'),
                Tables\Columns\TextColumn::make('moratorium_interest')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Interés de mora'),
                Tables\Columns\TextColumn::make('extra_accounting_interest')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Intereses extracon'),
                Tables\Columns\TextColumn::make('amount_invoiced')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Cap facturado'),
                Tables\Columns\TextColumn::make('amount_not_invoiced')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Cap. No facturado'),
                Tables\Columns\TextColumn::make('debt_value')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Capital'),
                Tables\Columns\TextColumn::make('customer_collection_expenses')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Total gastos cob cliente'),
                Tables\Columns\TextColumn::make('agent_collection_expenses')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Total gastos cob Agencia'),
                Tables\Columns\TextColumn::make('total_collection_expenses')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Total gastos cob'),
                // /** Campos con 'co' */
                Tables\Columns\TextColumn::make('codebtor_name')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Nombre Cod.'),
                Tables\Columns\TextColumn::make('codebtor_dni_number')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Cédula Cod.'),
                Tables\Columns\TextColumn::make('codebtor_address')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Dirección cod'),
                Tables\Columns\TextColumn::make('codebtor_neighborhood')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Barrio cod'),
                Tables\Columns\TextColumn::make('codebtor_phone_number1')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Celular cod'),
                Tables\Columns\TextColumn::make('codebtor_phone_number2')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tel 2 cod'),
                Tables\Columns\TextColumn::make('codebtor_phone_number3')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tel 3 cod'),
                Tables\Columns\TextColumn::make('codebtor_email1')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo1 cod'),
                Tables\Columns\TextColumn::make('codebtor_email2')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo2 cod'),
                Tables\Columns\TextColumn::make('codebtor_email3')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo3 cod'),
                Tables\Columns\TextColumn::make('codebtor2_name')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Nombre Cod2.'),
                Tables\Columns\TextColumn::make('codebtor2_dni_number')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Cédula Cod2.'),
                Tables\Columns\TextColumn::make('codebtor2_address')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Dirección cod2'),
                Tables\Columns\TextColumn::make('codebtor2_neighborhood')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Barrio cod2'),
                Tables\Columns\TextColumn::make('codebtor2_zip_code')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Código postal cod2'),
                Tables\Columns\TextColumn::make('codebtor2_city')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Ciudad cod2'),
                Tables\Columns\TextColumn::make('codebtor2_phone_number1')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tel1 cod2'),
                Tables\Columns\TextColumn::make('codebtor2_phone_number2')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tel2 cod2'),
                Tables\Columns\TextColumn::make('codebtor2_phone_number3')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Tel3 cod2'),
                Tables\Columns\TextColumn::make('codebtor2_email1')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo1 cod2'),
                Tables\Columns\TextColumn::make('codebtor2_email2')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo2 cod2'),
                Tables\Columns\TextColumn::make('codebtor2_email3')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Correo3 cod2'),
                Tables\Columns\TextColumn::make('created_at')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Fecha de creación'),
                Tables\Columns\TextColumn::make('updated_at')->toggleable()->toggleable(isToggledHiddenByDefault: false)->label('Fecha de actualización'),

            ])
            ->actions([
                Action::make('resetColumns')
                    ->label('Restablecer Columnas')
                    ->action(fn ($livewire) => $livewire->resetTableColumnToggleableVisibility())
                    ->color('primary')
                    ->icon('heroicon-o-refresh'),
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
