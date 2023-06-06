<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_code',
        'resident_name',
        'email',
        'phone',
        'apart_unit',
        'preferred_language',
        'license_plate',
        'vin',
        'make',
        'model',
        'year',
        'color',
        'vehicle_type',
    ];
}
