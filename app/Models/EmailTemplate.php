<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;

    protected $table = 'email_templates'; // Nombre correcto de la tabla

    protected $fillable = [
        'agent_id',
        'short',
        'template',
        'is_global',
    ];
}

