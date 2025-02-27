<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = [
        'id',
        'costumer_id',
        'agent_id',
        'status_id',
        'next_task',
        'last_management_type_id',
        'discount',
        'health_entity',
        'debtor_name',
        'dni_number',
        'debtor_address',
        'debtor_city',
        'debtor_zip_code',
        'debtor_neighborhood',
        'company_name',
        'company_address',
        'debtor_phone_number1',
        'debtor_phone_number2',
        'debtor_phone_number3',
        'debtor_phone_number4',
        'debtor_email1',
        'debtor_email2',
        'debtor_email3',
        'total_debt',
        'total_debt_with_discount',
        'current_interest',
        'moratorium_interest',
        'extra_accounting_interest',
        'amount_invoiced',
        'amount_not_invoiced',
        'debt_value',
        'customer_collection_expenses',
        'agent_collection_expenses',
        'total_collection_expenses',
        // /** Campos con 'co' */
        'codebtor_name',
        'codebtor_dni_number',
        'codebtor_address',
        'codebtor_neightborhood',
        'codebtor_phone_number1',
        'codebtor_phone_number2',
        'codebtor_phone_number3',
        'codebtor_email1',
        'codebtor_email2',
        'codebtor_email3',
        'codebtor2_name',
        'codebtor2_dni_number',
        'codebtor2_address',
        'codebtor2_neightborhood',
        'codebtor2_zip_code',
        'codebtor2_city',
        'codebtor2_phone_number1',
        'codebtor2_phone_number2',
        'codebtor2_phone_number3',
        'codebtor2_email1',
        'codebtor2_email2',
        'codebtor2_email3',
        'created_at',
        'updated_at',

    ];

    // // Relación con HomeVisitRecords (Un portfolio tiene muchas visitas)
    // public function homeVisitRecords()
    // {
    //     return $this->hasMany(HomeVisitRecord::class);
    // }

    // // Relación con Investigations (Un portfolio tiene muchas investigaciones)
    // public function investigations()
    // {
    //     return $this->hasMany(Investigation::class);
    // }

    // // Relación con Managements (Un portfolio tiene muchas gestiones)
    // public function managements()
    // {
    //     return $this->hasMany(Management::class);
    // }
}
