<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailRegisterVehicle extends Model
{
    use HasFactory;
    protected $table = 'emails_registervehicle'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'email_content',
        'property_code',
    ];
}
