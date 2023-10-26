<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultEmailRegisterVehicle extends Model
{
    use HasFactory;
     // Nombre de la tabla asociada al modelo
     protected $table = 'default_emails_register_vehicle';

     // Los campos que se pueden llenar de forma masiva
     protected $fillable = [
         'email_content',
         'property_code',
     ];
}
