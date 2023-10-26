<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultEmailExpired extends Model
{
    use HasFactory;
    protected $table = 'default_email_expired'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'email_content',
    ];
}
