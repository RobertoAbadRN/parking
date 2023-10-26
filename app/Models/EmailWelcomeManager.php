<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailWelcomeManager extends Model
{
    use HasFactory;
    protected $table = 'emails_welcome_manager'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'email_content', // Nombre de las columnas en tu tabla
        'property_code',
    ];
}
