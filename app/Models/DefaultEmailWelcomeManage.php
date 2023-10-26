<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultEmailWelcomeManage extends Model
{
    use HasFactory;
    
    protected $table = 'default_email_welcomemanager'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'email_content', // Nombre de las columnas en tu tabla
        'property_code',
    ];
}
