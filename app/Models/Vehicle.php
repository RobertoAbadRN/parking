<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'license_plate',
        'vin',
        'make',
        'model',
        'year',
        'color',
        'vehicle_type',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_code', 'property_code');
    }

  
}

