<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorPass extends Model
{
    use HasFactory;
    protected $table = 'visitorpasses'; // Nombre de la tabla en la base de datos
    protected $fillable = [
        'property_code',
        'visitor_name',
        'visitor_phone',
        'license_plate',
        'year',
        'make',
        'color',
        'vehicle_type',
        'resident_name',
        'unit_number',
        'resident_phone',
        'valid_from',
        'model',
    ];
}

