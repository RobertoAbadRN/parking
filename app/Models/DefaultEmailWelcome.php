<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultEmailWelcome extends Model
{
    use HasFactory;
    protected $table = 'default_email_welcome'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'email_content', // Nombre de las columnas en tu tabla
        'property_code',
    ];
}
