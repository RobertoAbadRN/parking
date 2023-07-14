<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_name',
        'property_code',
        'resident_name',
        'email',
        'phone',
        'apart_unit',
        'preferred_language',
    ];
}
