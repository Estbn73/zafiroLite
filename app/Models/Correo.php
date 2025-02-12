<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    use HasFactory;

    protected $table = 'correos'; // Asegura que Laravel use la tabla correcta

    protected $fillable = ['destinatario', 'asunto', 'mensaje', 'adjunto'];
}
